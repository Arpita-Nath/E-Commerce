<?php
use PHPUnit\Framework\TestCase;

class userTest extends TestCase{
    public function testToGetFirstName(){
        $user = new \App\Models\User;

        $user->setFirstName('Billy');
        $this->assertEquals($user->getFirstName(), 'Billy');
    }
    public function testToGetLasttName(){
        $user = new \App\Models\User;

        $user->setLastName('Billy');
        $this->assertEquals($user->getFirstName(), 'marcer');
    }
    public function testToGetfulltName(){
        $user = new \App\Models\User;

        $user->setFirstName('Billy');
        $user->setLastName('marcer');
        $this->assertEquals($user->getFullName(), 'Billy marcer');
    }

    public function testFirstandLastNameAreTerminatted(){
        $user = new \App\Models\User;
        $user->setFirstName('Billy        ');
        $user->setLastName('         marcer');
        $this->assertEquals($user->getFirstName(), 'Billy');
        $this->assertEquals($user->getFirstName(), 'marcer');
        
    }

    public function testEmailAddressCanSer(){
        $user = new \App\Models\User;
        $user->setFirstName('Billy');
        $user->setLastName('marcer');
        $user->setEmail('billy@gmail.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name',$emailVariables);
        $this->assertArrayHasKey('email',$emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Billy marcer');
        $this->assertEquals($emailVariables['email'], 'billy@gmail.com');


    }

    


}