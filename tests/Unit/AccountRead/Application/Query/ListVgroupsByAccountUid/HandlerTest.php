<?php

declare(strict_types=1);

namespace LanBilling\Tests\Unit\AccountRead\Application\Query\ListVgroupsByAccountUid;

use LanBilling\AccountRead\Application\Query\ListVgroupsByAccountUid\Handler;
use LanBilling\AccountRead\Application\Query\ListVgroupsByAccountUid\Query;
use LanBilling\AccountRead\Domain\Model\AccountVgroupLink;
use LanBilling\AccountRead\Domain\Persistence\IAccountVgroupLinkRepository;
use LanBilling\Vgroup\Domain\Model\Vgroup;
use LanBilling\Vgroup\Domain\Persistence\IVgroupRepository;
use PHPUnit\Framework\TestCase;

final class HandlerTest extends TestCase
{
    public function testItLoadsVgroupsForAccountUidThroughRelationshipRepository(): void
    {
        $linkRepository = new class () implements IAccountVgroupLinkRepository {
            public int $receivedUid = 0;

            public function getLinksByAccountUid(int $uid): array
            {
                $this->receivedUid = $uid;

                return [
                    new AccountVgroupLink(5, 10),
                    new AccountVgroupLink(5, 11),
                ];
            }
        };

        $vgroupTen = $this->createVgroup(10);
        $vgroupEleven = $this->createVgroup(11);

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

        $handler = new Handler($linkRepository, $vgroupRepository);

        $result = $handler(new Query(5));

        self::assertSame(5, $linkRepository->receivedUid);
        self::assertSame([10, 11], $vgroupRepository->receivedIds);
        self::assertSame([$vgroupTen, $vgroupEleven], $result);
    }

    public function testItSkipsVgroupLookupWhenAccountHasNoLinks(): void
    {
        $linkRepository = new class () implements IAccountVgroupLinkRepository {
            public function getLinksByAccountUid(int $uid): array
            {
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

        $handler = new Handler($linkRepository, $vgroupRepository);

        $result = $handler(new Query(7));

        self::assertSame([], $result);
        self::assertSame(0, $vgroupRepository->calls);
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
