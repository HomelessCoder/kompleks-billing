<?php

declare(strict_types=1);

namespace LanBilling\Tests\Unit\Account\Application\Query\GetAccount;

use LanBilling\Account\Application\Query\GetAccount\Handler;
use LanBilling\Account\Application\Query\GetAccount\Query;
use LanBilling\Account\Domain\Model\Account;
use LanBilling\Account\Domain\Model\AccountType;
use LanBilling\Account\Domain\Model\DiplomatStatus;
use LanBilling\Account\Domain\Model\ResidentStatus;
use LanBilling\Account\Domain\Persistence\IAccountRepository;
use PHPUnit\Framework\TestCase;

final class HandlerTest extends TestCase
{
    public function testItReturnsAccountByUid(): void
    {
        $account = $this->createAccount(5);

        $accountRepository = new class ($account) implements IAccountRepository {
            public int $receivedUid = 0;

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
                $this->receivedUid = $uid;

                return $uid === $this->account->uid ? $this->account : null;
            }

            public function getAccountsByUids(array $uids): array
            {
                return in_array($this->account->uid, $uids, true) ? [$this->account] : [];
            }
        };

        $handler = new Handler($accountRepository);

        $result = $handler(new Query(5));

        self::assertSame(5, $accountRepository->receivedUid);
        self::assertSame($account, $result);
    }

    public function testItReturnsNullWhenAccountDoesNotExist(): void
    {
        $accountRepository = new class () implements IAccountRepository {
            public int $receivedUid = 0;

            public function getAccounts(): array
            {
                return [];
            }

            public function getAccountByUid(int $uid): ?Account
            {
                $this->receivedUid = $uid;

                return null;
            }

            public function getAccountsByUids(array $uids): array
            {
                return [];
            }
        };

        $handler = new Handler($accountRepository);

        $result = $handler(new Query(404));

        self::assertSame(404, $accountRepository->receivedUid);
        self::assertNull($result);
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
