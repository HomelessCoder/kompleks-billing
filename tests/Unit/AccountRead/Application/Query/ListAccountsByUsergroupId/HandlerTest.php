<?php

declare(strict_types=1);

namespace LanBilling\Tests\Unit\AccountRead\Application\Query\ListAccountsByUsergroupId;

use LanBilling\Account\Domain\Model\Account;
use LanBilling\Account\Domain\Model\AccountType;
use LanBilling\Account\Domain\Model\DiplomatStatus;
use LanBilling\Account\Domain\Model\ResidentStatus;
use LanBilling\Account\Domain\Persistence\IAccountRepository;
use LanBilling\AccountRead\Application\Query\ListAccountsByUsergroupId\Handler;
use LanBilling\AccountRead\Application\Query\ListAccountsByUsergroupId\Query;
use LanBilling\AccountRead\Domain\Persistence\IAccountUsergroupLinkRepository;
use PHPUnit\Framework\TestCase;

final class HandlerTest extends TestCase
{
    public function testItLoadsAccountsForUsergroupId(): void
    {
        $accountFive = $this->createAccount(5);
        $accountSeven = $this->createAccount(7);

        $linkRepository = new class () implements IAccountUsergroupLinkRepository {
            public int $receivedGroupId = 0;

            public function getAccountUidsByGroupId(int $groupId): array
            {
                $this->receivedGroupId = $groupId;

                return [5, 7];
            }
        };

        $accountRepository = new class ($accountFive, $accountSeven) implements IAccountRepository {
            /** @var array<int> */
            public array $receivedUids = [];

            public function __construct(
                private readonly Account $accountFive,
                private readonly Account $accountSeven,
            ) {
            }

            public function getAccounts(): array
            {
                return [$this->accountFive, $this->accountSeven];
            }

            public function getAccountByUid(int $uid): ?Account
            {
                return match ($uid) {
                    5 => $this->accountFive,
                    7 => $this->accountSeven,
                    default => null,
                };
            }

            public function getAccountsByUids(array $uids): array
            {
                $this->receivedUids = $uids;

                return [$this->accountFive, $this->accountSeven];
            }
        };

        $handler = new Handler($linkRepository, $accountRepository);

        $result = $handler(new Query(14));

        self::assertSame(14, $linkRepository->receivedGroupId);
        self::assertSame([5, 7], $accountRepository->receivedUids);
        self::assertSame([$accountFive, $accountSeven], $result);
    }

    public function testItSkipsAccountLookupWhenUsergroupHasNoLinks(): void
    {
        $linkRepository = new class () implements IAccountUsergroupLinkRepository {
            public function getAccountUidsByGroupId(int $groupId): array
            {
                return [];
            }
        };

        $accountRepository = new class () implements IAccountRepository {
            public int $calls = 0;

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
                $this->calls++;

                return [];
            }
        };

        $handler = new Handler($linkRepository, $accountRepository);

        $result = $handler(new Query(14));

        self::assertSame([], $result);
        self::assertSame(0, $accountRepository->calls);
    }

    public function testItReturnsOnlyResolvedAccountsForStaleLinks(): void
    {
        $accountFive = $this->createAccount(5);

        $linkRepository = new class () implements IAccountUsergroupLinkRepository {
            public function getAccountUidsByGroupId(int $groupId): array
            {
                return [5, 999];
            }
        };

        $accountRepository = new class ($accountFive) implements IAccountRepository {
            public function __construct(
                private readonly Account $accountFive,
            ) {
            }

            public function getAccounts(): array
            {
                return [$this->accountFive];
            }

            public function getAccountByUid(int $uid): ?Account
            {
                return $uid === 5 ? $this->accountFive : null;
            }

            public function getAccountsByUids(array $uids): array
            {
                return [$this->accountFive];
            }
        };

        $handler = new Handler($linkRepository, $accountRepository);

        $result = $handler(new Query(14));

        self::assertSame([$accountFive], $result);
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
}
