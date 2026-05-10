<?php

declare(strict_types=1);

namespace LanBilling\Tests\Unit\AccountRead\Application\Query\GetAccountWithVgroupsByUid;

use LanBilling\Account\Domain\Model\Account;
use LanBilling\Account\Domain\Model\AccountType;
use LanBilling\Account\Domain\Model\DiplomatStatus;
use LanBilling\Account\Domain\Model\ResidentStatus;
use LanBilling\Account\Domain\Persistence\IAccountRepository;
use LanBilling\AccountRead\Application\Query\GetAccountWithVgroupsByUid\Handler;
use LanBilling\AccountRead\Application\Query\GetAccountWithVgroupsByUid\Query;
use LanBilling\AccountRead\Application\ReadModel\AccountWithVgroups;
use LanBilling\AccountRead\Domain\Model\AccountVgroupLink;
use LanBilling\AccountRead\Domain\Persistence\IAccountVgroupLinkRepository;
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

        $handler = new Handler($accountRepository, $linkRepository, $vgroupRepository);

        $result = $handler(new Query(404));

        self::assertNull($result);
        self::assertSame(0, $linkRepository->calls);
        self::assertSame(0, $vgroupRepository->calls);
    }

    public function testItReturnsAccountWithItsVgroups(): void
    {
        $account = $this->createAccount(5);
        $vgroupTen = $this->createVgroup(10);
        $vgroupEleven = $this->createVgroup(11);

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

        $handler = new Handler($accountRepository, $linkRepository, $vgroupRepository);

        $result = $handler(new Query(5));

        self::assertInstanceOf(AccountWithVgroups::class, $result);
        self::assertSame($account, $result->account);
        self::assertSame([$vgroupTen, $vgroupEleven], $result->vgroups);
        self::assertSame([10, 11], $vgroupRepository->receivedIds);
    }

    public function testItReturnsAccountWithEmptyVgroupsWhenThereAreNoLinks(): void
    {
        $account = $this->createAccount(8);

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

        $handler = new Handler($accountRepository, $linkRepository, $vgroupRepository);

        $result = $handler(new Query(8));

        self::assertInstanceOf(AccountWithVgroups::class, $result);
        self::assertSame($account, $result->account);
        self::assertSame([], $result->vgroups);
        self::assertSame([], $vgroupRepository->receivedIds);
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
