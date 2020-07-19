<?php
use App\User;
use Illuminate\Support\Facades\Hash;
use Page\Functional\PostsPage;

class AuthCest
{
    private $userAttributes;

    public function _before()
    {
        $this->userAttributes = [
            'email' =>  'employeetest@eas.com',
            'name'=>'UserTest',
            'password' => Hash::make('P@ssw0rd'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
    }

    public function loginUsingUserRecord(FunctionalTester $I)
    {
        $I->amLoggedAs(User::create($this->userAttributes));

        $I->amOnPage(PostsPage::$url);

        $I->seeCurrentUrlEquals(PostsPage::$url);
        $I->seeAuthentication();

        // Login should persist between requests
//        $I->amOnPage(PostsPage::$url);
//
//        $I->seeAuthentication();
    }

    public function loginUsingCredentials(FunctionalTester $I)
    {
        $I->haveRecord('users', $this->userAttributes);
        $I->amLoggedAs(['name'=>'UserTest','email' => 'employeetest@eas.com', 'password' =>'P@ssw0rd']);

        $I->amOnPage(PostsPage::$url);

        $I->seeCurrentUrlEquals(PostsPage::$url);
        $I->seeAuthentication();

        // Login should persist between requests
//        $I->amOnPage(PostsPage::$url);
//
//        $I->seeAuthentication();
    }
//
//    public function secureRouteWithoutAuthenticatedUser(FunctionalTester $I)
//    {
//        $I->amOnPage('/secure');
//
//        $I->seeCurrentUrlEquals('/login');
//    }
//
//    public function secureRouteWithAuthenticatedUser(FunctionalTester $I)
//    {
//        $I->amLoggedAs(User::create($this->userAttributes));
//
//        $I->amOnPage('/secure');
//
//        $I->see('Hello World');
//    }

}
