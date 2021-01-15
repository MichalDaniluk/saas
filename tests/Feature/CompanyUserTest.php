<?php

namespace Tests\Feature;

use App\Exceptions\NoCompanyUserException;
use App\Models\CompanyUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyUserTest extends TestCase
{
    public function testShoudReturnCompanyIdAsNumberWhenUserExists()
    {
        $userId = 6;
        $company_id = CompanyUser::getCompanyId($userId);
        $this->assertIsInt($company_id);
    }

    public function testShouldReturnZeroWhenUserHaveNotLastCompany()
    {
        $userId = 10;
        $lastCompanyId = CompanyUser::getLastCompanyId($userId);
        $this->assertSame(0,$lastCompanyId);
    }

    public function testShouldReturnNoCompanyUserExceptionWhenCompanyIdIsNull()
    {
        $this->expectException(NoCompanyUserException::class);
        $this->expectExceptionMessage('_user_not_belong_to_company');

        $userId = 10;
        $lastCompanyId = CompanyUser::getCompanyId($userId);
    }
}
