<?php


namespace Tests\Acceptance;

use Codeception\Util\Locator;
use Tests\Support\AcceptanceTester;

class FirstCest
{
    public function frontpageWorks(AcceptanceTester $I)
    {                
        $I->amOnPage('/sign-in');
        $I->wait(3);
        $I->seeElement("input[type=email]");        
        $I->seeElement("input[type=password]");
        $I->fillField("input[type=email]", 'client@crassula.io');
        $I->fillField("input[type=password]", 'Qwerty123');
        $I->click('button[type=submit]');
        $I->wait(3);
        $I->seeInCurrentUrl("dashboard");                
        $I->amOnPage("/payments");        
        $I->wait(3);
        $I->seeInCurrentUrl("payments/history");        
        $I->amOnPage("/payments/internal");
        $I->wait(3);
        $I->seeInCurrentUrl("payments/internal");
        $I->fillField("You send", 3.57);
        $I->fillField("Phone, @username or account number", 13413119267);
        $I->fillField("Add description", "payment in gbp to friend");
        $I->fillField("Set template name", "testTemplate");
        $I->click("mat-select-trigger");        
        $I->click("//mat-option//span//span[text()='GBP']");
        $I->amOnPage("/payments/history");
        $I->wait(3);
        $I->click("mat-row");            
        $I->see("-3.57 GBP", "//div[contains(@class, 'summary__amount')]");
        $I->see("13413119267", "//div[* = 'Beneficiary account number']//following-sibling::div");
        $I->see("payment in gbp to friend", "//div[* = 'Description']//following-sibling::div");
        $recipientAccountNumber = $I->grabTextFrom("//div[* = 'Beneficiary account number']//following-sibling::div");
        $description = $I->grabTextFrom("//div[* = 'Description']//following-sibling::div");
        $summaryAmount = $I->grabTextFrom("//div[contains(@class, 'summary__amount')]");
        $csv = [$recipientAccountNumber, $description, $summaryAmount];
        $fp = fopen('file.csv', 'w');
        fputcsv($fp, $csv);        
        fclose($fp);
        $I->click(".dialog-close");
        $I->wait(3);
        $I->click(".profile");        
        $I->click("//div[* = 'Sign out']");
        $I->wait(3);
    }
}
