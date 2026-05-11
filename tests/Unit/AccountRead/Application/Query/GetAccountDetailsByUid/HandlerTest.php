<?php

declare(strict_types=1);

namespace LanBilling\Tests\Unit\AccountRead\Application\Query\GetAccountDetailsByUid;

use DateTimeImmutable;
use LanBilling\Account\Domain\Model\Account;
use LanBilling\Account\Domain\Model\AccountType;
use LanBilling\Account\Domain\Model\DiplomatStatus;
use LanBilling\Account\Domain\Model\ResidentStatus;
use LanBilling\Account\Domain\Persistence\IAccountRepository;
use LanBilling\AccountRead\Application\Query\GetAccountDetailsByUid\Handler;
use LanBilling\AccountRead\Application\Query\GetAccountDetailsByUid\Query;
use LanBilling\AccountRead\Application\ReadModel\AccountWithVgroupsAndAgreements;
use LanBilling\AccountRead\Domain\Model\AccountVgroupLink;
use LanBilling\AccountRead\Domain\Persistence\IAccountVgroupLinkRepository;
use LanBilling\Agreement\Domain\Model\Agreement;
use LanBilling\Agreement\Domain\Persistence\IAgreementRepository;
use LanBilling\Vgroup\Domain\Model\Vgroup;
use LanBilling\Vgroup\Domain\Persistence\IVgroupRepository;
use PHPUnit\Framework\TestCase;

final class HandlerTest extends TestCase
{
    public function testItReturnsNullWhenAccountDoesNotExist(): void
    {
        $accountRepository = new class () implements IAccountRepository {
            public function getAccounts(): array
            {
                return [];
            }

            public function getAccountByUid(int $uid): ?Account
            {
                return null;
            }

            public function getAccountsByUids(array $uids): array
            {
                return [];
            }
        };

        $linkRepository = new class () implements IAccountVgroupLinkRepository {
            public int $calls = 0;

            public function getLinksByAccountUid(int $uid): array
            {
                $this->calls++;

                return [];
            }
        };

        $vgroupRepository = new class () implements IVgroupRepository {
            public int $calls = 0;

            public function getVgroups(): array
            {
                return [];
            }

            public function getVgroupsByIds(array $vgIds): array
            {
                $this->calls++;

                return [];
            }
        };

        $agreementRepository = new class () implements IAgreementRepository {
            public int $calls = 0;

            public function getAgreementsByAccountUid(int $uid, ?int $operatorId = null): array
            {
                $this->calls++;

                return [];
            }

            public function getAgreementsByAccountUids(array $uids, ?int $operatorId = null): array
            {
                return [];
            }
        };

        $handler = new Handler($accountRepository, $linkRepository, $vgroupRepository, $agreementRepository);

        $result = $handler(new Query(404));

        self::assertNull($result);
        self::assertSame(0, $linkRepository->calls);
        self::assertSame(0, $vgroupRepository->calls);
        self::assertSame(0, $agreementRepository->calls);
    }

    public function testItReturnsAccountDetailsWithVgroupsAndAgreements(): void
    {
        $account = $this->createAccount(5);
        $vgroupTen = $this->createVgroup(10);
        $vgroupEleven = $this->createVgroup(11);
        $firstAgreement = new Agreement(5, 1, 'A-1', new DateTimeImmutable('2024-01-01'));
        $secondAgreement = new Agreement(5, 2, 'A-2', null);

        $accountRepository = new class ($account) implements IAccountRepository {
            public function __construct(
                private readonly Account $account,
            ) {
            }

            public function getAccounts(): array
            {
                return [$this->account];
            }

            public function getAccountByUid(int $uid): ?Account
            {
                return $uid === $this->account->uid ? $this->account : null;
            }

            public function getAccountsByUids(array $uids): array
            {
                return in_array($this->account->uid, $uids, true) ? [$this->account] : [];
            }
        };

        $linkRepository = new class () implements IAccountVgroupLinkRepository {
            public function getLinksByAccountUid(int $uid): array
            {
                return [
                    new AccountVgroupLink($uid, 10),
                    new AccountVgroupLink($uid, 11),
                ];
            }
        };

        $vgroupRepository = new class ($vgroupTen, $vgroupEleven) implements IVgroupRepository {
            /** @var array<int> */
            public array $receivedIds = [];

            public function __construct(
                private readonly Vgroup $vgroupTen,
                private readonly Vgroup $vgroupEleven,
            ) {
            }

            public function getVgroups(): array
            {
                return [];
            }

            public function getVgroupsByIds(array $vgIds): array
            {
                $this->receivedIds = $vgIds;

                return [$this->vgroupTen, $this->vgroupEleven];
            }
        };

        $agreementRepository = new class ($firstAgreement, $secondAgreement) implements IAgreementRepository {
            public int $receivedUid = 0;

            public function __construct(
                private readonly Agreement $firstAgreement,
                private readonly Agreement $secondAgreement,
            ) {
            }

            public function getAgreementsByAccountUid(int $uid, ?int $operatorId = null): array
            {
                $this->receivedUid = $uid;

                return [$this->firstAgreement, $this->secondAgreement];
            }

            public function getAgreementsByAccountUids(array $uids, ?int $operatorId = null): array
            {
                return [];
            }
        };

        $handler = new Handler($accountRepository, $linkRepository, $vgroupRepository, $agreementRepository);

        $result = $handler(new Query(5));

        self::assertInstanceOf(AccountWithVgroupsAndAgreements::class, $result);
        self::assertSame($account, $result->account);
        self::assertSame([$vgroupTen, $vgroupEleven], $result->vgroups);
        self::assertSame([$firstAgreement, $secondAgreement], $result->agreements);
        self::assertSame([10, 11], $vgroupRepository->receivedIds);
        self::assertSame(5, $agreementRepository->receivedUid);
    }

    public function testItReturnsAccountDetailsWithEmptyVgroupsWhenThereAreNoLinks(): void
    {
        $account = $this->createAccount(8);
        $agreement = new Agreement(8, 3, 'A-3', null);

        $accountRepository = new class ($account) implements IAccountRepository {
            public function __construct(
                private readonly Account $account,
            ) {
            }

            public function getAccounts(): array
            {
                return [$this->account];
            }

            public function getAccountByUid(int $uid): ?Account
            {
                return $uid === $this->account->uid ? $this->account : null;
            }

            public function getAccountsByUids(array $uids): array
            {
                return in_array($this->account->uid, $uids, true) ? [$this->account] : [];
            }
        };

        $linkRepository = new class () implements IAccountVgroupLinkRepository {
            public function getLinksByAccountUid(int $uid): array
            {
                return [];
            }
        };

        $vgroupRepository = new class () implements IVgroupRepository {
            /** @var array<int> */
            public array $receivedIds = [];

            public function getVgroups(): array
            {
                return [];
            }

            public function getVgroupsByIds(array $vgIds): array
            {
                $this->receivedIds = $vgIds;

                return [];
            }
        };

        $agreementRepository = new class ($agreement) implements IAgreementRepository {
            public function __construct(
                private readonly Agreement $agreement,
            ) {
            }

            public function getAgreementsByAccountUid(int $uid, ?int $operatorId = null): array
            {
                return [$this->agreement];
            }

            public function getAgreementsByAccountUids(array $uids, ?int $operatorId = null): array
            {
                return [];
            }
        };

        $handler = new Handler($accountRepository, $linkRepository, $vgroupRepository, $agreementRepository);

        $result = $handler(new Query(8));

        self::assertInstanceOf(AccountWithVgroupsAndAgreements::class, $result);
        self::assertSame($account, $result->account);
        self::assertSame([], $result->vgroups);
        self::assertSame([$agreement], $result->agreements);
        self::assertSame([], $vgroupRepository->receivedIds);
    }

    public function testItReturnsAccountDetailsWithEmptyAgreementsWhenThereAreNoAgreements(): void
    {
        $account = $this->createAccount(13);
        $vgroup = $this->createVgroup(21);

        $accountRepository = new class ($account) implements IAccountRepository {
            public function __construct(
                private readonly Account $account,
            ) {
            }

            public function getAccounts(): array
            {
                return [$this->account];
            }

            public function getAccountByUid(int $uid): ?Account
            {
                return $uid === $this->account->uid ? $this->account : null;
            }

            public function getAccountsByUids(array $uids): array
            {
                return in_array($this->account->uid, $uids, true) ? [$this->account] : [];
            }
        };

        $linkRepository = new class () implements IAccountVgroupLinkRepository {
            public function getLinksByAccountUid(int $uid): array
            {
                return [new AccountVgroupLink($uid, 21)];
            }
        };

        $vgroupRepository = new class ($vgroup) implements IVgroupRepository {
            public function __construct(
                private readonly Vgroup $vgroup,
            ) {
            }

            public function getVgroups(): array
            {
                return [];
            }

            public function getVgroupsByIds(array $vgIds): array
            {
                return [$this->vgroup];
            }
        };

        $agreementRepository = new class () implements IAgreementRepository {
            public int $calls = 0;

            public function getAgreementsByAccountUid(int $uid, ?int $operatorId = null): array
            {
                $this->calls++;

                return [];
            }

            public function getAgreementsByAccountUids(array $uids, ?int $operatorId = null): array
            {
                return [];
            }
        };

        $handler = new Handler($accountRepository, $linkRepository, $vgroupRepository, $agreementRepository);

        $result = $handler(new Query(13));

        self::assertInstanceOf(AccountWithVgroupsAndAgreements::class, $result);
        self::assertSame($account, $result->account);
        self::assertSame([$vgroup], $result->vgroups);
        self::assertSame([], $result->agreements);
        self::assertSame(1, $agreementRepository->calls);
    }

    private function createAccount(int $uid): Account
    {
        return new Account(
            uid: $uid,
            login: null,
            pass: null,
            ipaccess: null,
            type: AccountType::Personal,
            balance: 0.0,
            depth: null,
            descr: null,
            name: null,
            phone: null,
            fax: null,
            agrmNum: null,
            agrmDate: null,
            email: null,
            kod1c: null,
            billDelivery: null,
            category: null,
            bankName: null,
            branchBankName: null,
            treasuryName: null,
            treasuryAccount: null,
            bik: null,
            settl: null,
            corr: null,
            kpp: null,
            inn: null,
            ogrn: null,
            okpo: null,
            okved: null,
            genDirU: null,
            glBuhgU: null,
            kontPerson: null,
            actOnWhat: null,
            faIndex: null,
            country: null,
            city: null,
            street: null,
            bnum: null,
            bknum: null,
            apart: null,
            addr: null,
            region: null,
            district: null,
            settleArea: null,
            yuIndex: null,
            countryU: null,
            cityU: null,
            streetU: null,
            bnumU: null,
            bknumU: null,
            apartU: null,
            addrU: null,
            regionU: null,
            districtU: null,
            settleAreaU: null,
            bIndex: null,
            countryB: null,
            cityB: null,
            regionB: null,
            districtB: null,
            settleAreaB: null,
            streetB: null,
            bnumB: null,
            bknumB: null,
            apartB: null,
            addrB: null,
            passSernum: null,
            passNo: null,
            passIssuedate: null,
            passIssuedep: null,
            passIssueplace: null,
            birthdate: null,
            birthplace: null,
            lastModDate: null,
            wrongActive: 0,
            wrongDate: null,
            diplomat: DiplomatStatus::NonDiplomat,
            resident: ResidentStatus::Resident,
            agrmType: 1,
            oksm: 643,
            okato: '0',
            publicAgree: false,
        );
    }

    private function createVgroup(int $vgId): Vgroup
    {
        return new Vgroup(
            vgId: $vgId,
            cLimit: 0,
            dLimit: 0,
            dClear: null,
            login: null,
            pass: null,
            status: null,
            blkReq: null,
            blocked: null,
            descr: null,
            balance: null,
            tarId: null,
            agentId: null,
            modified: null,
            bLimit: null,
            bCheck: null,
            bNotify: null,
            offTime: null,
            billActive: null,
            accOn: null,
            accOnDate: null,
            accOffDate: null,
            traffType: null,
            depth: null,
            allowNoIp: null,
            telPin: null,
            changed: null,
            shape: null,
            useAon: null,
            zcTable: null,
            zcRecordId: null,
            zcBalance: null,
            zcType: null,
            prevCLimit: null,
            accOnPlanDate: null,
            comments: '',
            wrongActive: 0,
            wrongDate: null,
            operator: null,
            useAs: null,
            maxSessions: null,
            archive: null,
            operCode: null,
            vatFree: null,
            ignoreUserBlock: null,
            kod1c: null,
            cuId: null,
        );
    }
}
