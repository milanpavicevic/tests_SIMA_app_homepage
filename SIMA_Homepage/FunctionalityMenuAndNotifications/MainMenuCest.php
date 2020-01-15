<?php

include_once dirname(dirname(__FILE__)) . '/Homepage_Common.php';
include_once 'MainMenu_help.php';

class MainMenuCest
{
    public function _after(AcceptanceTester $I)
    {   
    }
    
    public function Wiki(AcceptanceTester $I, $scenario)
    {
        $I->wantTo('Wiki - s: 6');
        $scenario->incomplete('Test se ne izvrsava jer link u DEMO verziji ne vodi nikuda.');
        $I->waitForElementVisible(Homepage_Common::$_top_bar_wiki_icon, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_top_bar_wiki_icon);
        $I->switchToNextTab();
        $I->seeCurrentUrlEquals('http://wiki.local.rs/sima_wiki_login.php');
    }
    
    public function Email(AcceptanceTester $I)
    {
        $I->wantTo('Messages - s: 7');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(Homepage_Common::$_email, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_email);
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_email_id, 'a', 'Pregled');
    }
    
    public function Files(AcceptanceTester $I)
    {
        $I->wantTo('Files - s: 8');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(Homepage_Common::$_top_bar_files, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_top_bar_files);
        $I->waitForElementVisible(MainMenu_help::$_files_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_files_id, 'a', Homepage_Common::$_my_documents_string);
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_files_id, 'a', 'Kanta');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_files_id, 'a', 'Pretraživač');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_files_id, 'Tabela');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_files_id, 'Pretraživač');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_files_id, 'a', 'Dodaj fajl');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_files_id, 'a', 'Manipulacija PDF dokumentima');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_files_id, 'a', 'Svi zaključani fajlovi');
    }
    
    public function Addressbook(AcceptanceTester $I)
    {
        $I->wantTo('Addressbook - s: 9');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(MainMenu_help::$_addressbook, Helper\Acceptance::$wait_medium);
        $I->click(MainMenu_help::$_addressbook);
        $I->waitForText('Imenik', Helper\Acceptance::$wait_medium, MainMenu_help::$_tab_line);
        $I->waitForElementVisible(MainMenu_help::$_addressbook_window
                . "/div[contains(text(),'Imenik')]", Helper\Acceptance::$wait_medium);
        $I->waitForText('FIRME', Helper\Acceptance::$wait_medium, "//div[contains(concat(' ' ,@id, ' '), '_addressbook_companies')]"
                . "/div[@class='sima-layout-fixed-panel']"
                . "/div[@class='sima-addressbook-main-header-companies _full-width']"
                . "/div[contains(concat(' ' ,@class, ' '), 'sima-addressbook-capital-letters')]"
                . "/b");
        $I->waitForText('OSOBE', Helper\Acceptance::$wait_medium,
                "//div[contains(concat(' ' ,@id, ' '), '_addressbook_persons')]"
                . "/div[@class='sima-layout-fixed-panel']"
                . "/div[contains(concat(' ' ,@class, ' '), 'addressbook-main-header-persons')]"
                . "/div[contains(concat(' ' ,@class, ' '), 'addressbook-subheader')]/b");
    }
    
    public function FirstLinksAdmin(AcceptanceTester $I)
    {
        $I->wantTo('FirstLinksAdmin - s: 10');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(Homepage_Common::$_top_bar_admin, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_top_bar_admin);
        $I->waitForElementVisible(MainMenu_help::$_admin_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Korisnici');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'E-mail Podešavanja');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Prava pristupa');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Radni nalozi');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Konfiguracije');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'span', 'Klijent - Prijavljene greške i zahtevi');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'span', 'SIMA types');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'span', 'Fajlovi');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Execute');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Vue Flush');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Cache Flush');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Cache statistika');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'span', 'Kanta');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'EventRelay');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Ažuriranje verzije');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Šifarnici');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Strani sistemi');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Strani korisnici');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'InterProcessLocks');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'ModelChanges');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_admin_id, 'a', 'Pregled šablona');
    }
    
    public function SecondLinksAdmin(AcceptanceTester $I)
    {
        $I->wantTo('SecondLinksAdmin - s: 11');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(Homepage_Common::$_top_bar_admin, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_top_bar_admin);
        $I->waitForElementVisible(MainMenu_help::$_admin_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_admin_id, 'a', 'Korisnici');;
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Svi');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Sesije');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_admin_id, 'a', 'Prava pristupa');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Provera integriteta');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Pregled privilegija');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_admin_id, 'span', 'Klijent - Prijavljene greške i zahtevi');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Klijent - Prijavljene greške');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Klijent - Novi zahtevi');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_admin_id, 'span', 'SIMA types');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Nacini dostave');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Tipovi gradjevinskih objekata');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Strucne spreme');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Tipovi kontakata');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Izvodi iz banke');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Tipovi dana');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Vrste goriva');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Vozačke kategorije');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Kategorije kreditnih kartica za vozila');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Vrste pogona za vozila');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Periodi');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Objašnjenja(tooltips)');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_admin_id, 'span', 'Fajlovi');
        $I->waitForElementVisible("//ul[@id='yw5']/li/span[contains(text(),'Fajlovi')]/../ul/li/a[contains(text(),'Pregled')]", 
                Helper\Acceptance::$wait_medium);
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'FileVersions');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Skladista');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Pristupi fajlovima');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Tipovi dokumenata');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Ekstenzije');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_admin_id, 'span', 'Kanta');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_admin_id, 'Tabela');
    }
    
    public function ThirdLinksAdmin(AcceptanceTester $I)
    {
        $I->wantTo('ThirdLinksAdmin - s: 12');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(Homepage_Common::$_top_bar_admin, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_top_bar_admin);
        $I->waitForElementVisible(MainMenu_help::$_admin_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_admin_id, 'span', 'SIMA types');
        $I->moveMouseOver("//ul[@id='yw5']/li/ul/li/a[contains(text(),'Objašnjenja(tooltips)')]");
        MainMenu_help::ThirdLinks($I, MainMenu_help::$_admin_id, 'Objašnjenja po korisniku');
    }           
    
    public function EvidentionFirstLinks(AcceptanceTester $I)
    {
        $I->wantTo('EvidentionFirstLinks - s: 13');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(MainMenu_help::$_evidention, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(MainMenu_help::$_evidention);
        $I->waitForElementVisible(MainMenu_help::$_evidention_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_evidention_id, 'a', 'Zavodna knjiga');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_evidention_id, 'a', 'Teme | Poslovi');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_evidention_id, 'span', 'Ponude');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_evidention_id, 'a', 'Osnovna sredstva');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_evidention_id, 'a', 'IKS poeni svih inžinjera');
    }
    
    public function EvidentionSecondLinks(AcceptanceTester $I)
    {
        $I->wantTo('EvidentionSecondLinks - s: 14');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(MainMenu_help::$_evidention, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(MainMenu_help::$_evidention);
        $I->waitForElementVisible(MainMenu_help::$_evidention_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_evidention_id, 'span', 'Ponude');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Tabela ponuda');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Potencijalne ponude');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Tipovi dodatnih uslova za ponude');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Kvalifikacione Ponude');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Menice');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_evidention_id, 'a', 'Osnovna sredstva');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Spisak');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Tipovi osnovnih sredstava');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Putni nalozi');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Spisak PP aparata');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Računari');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Zaduženja osnovnih sredstava');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Inventarski brojevi');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_evidention_id, 'Popisi');
    }
    
    public function EvidentionThirdLinks(AcceptanceTester $I)
    {
        $I->wantTo('EvidentionThirdLinks - s: 15');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(MainMenu_help::$_evidention, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(MainMenu_help::$_evidention);
        $I->waitForElementVisible(MainMenu_help::$_evidention_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_evidention_id, 'a', 'Osnovna sredstva');
        $I->moveMouseOver("//ul[@id='yw4']/li/ul/li/a[contains(text(),'Vozila')]");
        MainMenu_help::ThirdLinks($I, MainMenu_help::$_evidention_id, 'Tabela');
        MainMenu_help::ThirdLinks($I, MainMenu_help::$_evidention_id, 'Registracije');
        MainMenu_help::ThirdLinks($I, MainMenu_help::$_evidention_id, 'Tehničke kontrole');
        MainMenu_help::ThirdLinks($I, MainMenu_help::$_evidention_id, 'Sertifikati');
        MainMenu_help::ThirdLinks($I, MainMenu_help::$_evidention_id, 'Kreditne kartice');
        MainMenu_help::ThirdLinks($I, MainMenu_help::$_evidention_id, 'Servisi');
        MainMenu_help::ThirdLinks($I, MainMenu_help::$_evidention_id, 'Dodatni agregati');
        MainMenu_help::ThirdLinks($I, MainMenu_help::$_evidention_id, 'Registar popravki vozila');
    }
    
    public function AccountingFirstLinks(AcceptanceTester $I)
    {
        $I->wantTo('AccountingFirstLinks - s: 16');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(MainMenu_help::$_accounting, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(MainMenu_help::$_accounting);
        $I->waitForElementVisible(MainMenu_help::$_accounting_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting_id, 'span', 'Ulaz');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting_id, 'span', 'Izlaz');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting_id, 'a', 'Izvodi');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting_id, 'span', 'Proizvodnja');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting_id, 'a', 'Računi');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting_id, 'a', 'Osnovna sredstva');
    }
    
    public function AccountingSecondLinks(AcceptanceTester $I)
    {
        $I->wantTo('AccountingSecondLinks - s: 17');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(MainMenu_help::$_accounting, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(MainMenu_help::$_accounting);
        $I->waitForElementVisible(MainMenu_help::$_accounting_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_accounting_id, 'span', 'Ulaz');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Računi');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Avansni računi');
        $I->waitForElementVisible("//ul[@id='yw3']/li/span[contains(text(),'Ulaz')]"
                . "/../ul/li/a[contains(text(),'Predracuni')]", Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible("//ul[@id='yw3']/li/span[contains(text(),'Ulaz')]"
                . "/../ul/li/a[contains(text(),'Knjižna odobrenja')]", Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible("//ul[@id='yw3']/li/span[contains(text(),'Ulaz')]"
                . "/../ul/li/a[contains(text(),'Knjižna zaduženja')]", Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_accounting_id, 'span', 'Izlaz');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Fakture');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Avansne fakture');
        $I->waitForElementVisible("//ul[@id='yw3']/li/span[contains(text(),'Izlaz')]"
                . "/../ul/li/a[contains(text(),'Predracuni')]", Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible("//ul[@id='yw3']/li/span[contains(text(),'Izlaz')]"
                . "/../ul/li/a[contains(text(),'Knjižna odobrenja')]", Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible("//ul[@id='yw3']/li/span[contains(text(),'Izlaz')]"
                . "/../ul/li/a[contains(text(),'Knjižna zaduženja')]", Helper\Acceptance::$wait_medium);
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Ponavljajući računi');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_accounting_id, 'a', 'Izvodi');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Placanja');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Za platiti');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Primljeni avansi');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Dati avansi');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_accounting_id, 'span', 'Proizvodnja');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Pogoni');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Recepti');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_accounting_id, 'a', 'Osnovna sredstva');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Spisak');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Amortizacije');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting_id, 'Tipovi osnovnih sredstava');
    }
    
    public function Accounting2FirstLinks(AcceptanceTester $I)
    {
        $I->wantTo('Accounting2FirstLinks - s: 18');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(MainMenu_help::$_accounting2, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(MainMenu_help::$_accounting2);
        $I->waitForElementVisible(MainMenu_help::$_accounting_field2, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting2_id, 'a', 'Finansijsko knjigovodstvo');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting2_id, 'a', 'PDV pregled');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting2_id, 'a', 'Magacin');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting2_id, 'a', 'Obračun zarada');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting2_id, 'a', 'Blagajna');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting2_id, 'span', 'Ostale evidencije');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting2_id, 'a', 'Preuzimanja dugova');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_accounting2_id, 'span', 'Šifarnici');
    }
    
    public function Accounting2SecondLinks(AcceptanceTester $I)
    {
        $I->wantTo('Accounting2SecondLinks - s: 19');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(MainMenu_help::$_accounting2, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(MainMenu_help::$_accounting2);
        $I->waitForElementVisible(MainMenu_help::$_accounting_field2, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_accounting2_id, 'a', 'Obračun zarada');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Uporedjivanje');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Finansijski meseci');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_accounting2_id, 'span', 'Ostale evidencije');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Menice');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Bankarske garancije');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_accounting2_id, 'span', 'Šifarnici');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Žiro računi');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Banke');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Šifre plaćanja');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Vrste placanja');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Mesta troška');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Stornirano');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Valute');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Srednji kursevi');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Jedinice mere');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Amortizacione grupe osnovnih sredstava');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_accounting2_id, 'Napomene o poreskom oslobođenju');
    }
    
    public function LawFirstLinks(AcceptanceTester $I)
    {
        $I->wantTo('LawFirstLinks - s: 20');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(Homepage_Common::$_top_bar_law, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_top_bar_law);
        $I->waitForElementVisible(MainMenu_help::$_top_bar_law_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_law_id, 'a', 'Ugovori');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_law_id, 'span', 'Zaposleni');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_law_id, 'span', 'Konkursi za posao');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_law_id, 'a', 'Evd.Bezbednosti');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_law_id, 'span', 'Velike licence');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_law_id, 'span', 'Šifarnici');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_law_id, 'a', 'Praznici');
    }
    
    public function LawSecondLinks(AcceptanceTester $I)
    {
        $I->wantTo('LawSecondLinks - s: 21');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(Homepage_Common::$_top_bar_law, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_top_bar_law);
        $I->waitForElementVisible(MainMenu_help::$_top_bar_law_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_law_id, 'span', 'Zaposleni');
        $I->waitForText('Spisak', Helper\Acceptance::$wait_medium, "//ul[@id='yw1']/li[2]/ul/li/a");
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Organizaciona šema');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Licence');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Uvodjenja u posao');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Pregled radnih sati');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_law_id, 'span', 'Konkursi za posao');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Konkursi');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Kandidati');
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_law_id, 'span', 'Velike licence');
        $I->waitForText('Spisak velikih licenci', Helper\Acceptance::$wait_medium, "//ul[@id='yw1']/li[5]/ul/li/a");
        $I->waitForElementVisible("//ul[@id='yw1']/li/ul/li[2]/a[contains(text(),'Velike licence po kompanijama')]");
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Rešenja velikih licenci');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Razlika velikih licenci u trenutnoj kompaniji i onih koje se nalaze na poslednjem rešenju');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Osobe koje su nosioci velike licence a nemaju godišnju kvotu od 15 bodova');
        $I->waitForElementVisible("//ul[@id='yw1']/li/ul/li[6]/a[contains(text(),'Velike licence po kompanijama')]");
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_law_id, 'span', 'Šifarnici');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Pravne godine');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Skole i smerovi');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Titule obrazovanja');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Zanimanja');
        MainMenu_help::SecondLinks($I, MainMenu_help::$_law_id, 'Nivoi kvalifikacija');
    }
    
    public function LawThirdLinks(AcceptanceTester $I)
    {
        $I->wantTo('LawThirdLinks - s: 22');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(Homepage_Common::$_top_bar_law, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_top_bar_law);
        $I->waitForElementVisible(MainMenu_help::$_top_bar_law_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksMouse($I, MainMenu_help::$_law_id, 'span', 'Zaposleni');
        $I->moveMouseOver("//ul[@id='yw1']/li[2]/ul/li/a[contains(text(),'Spisak')]");
        MainMenu_help::ThirdLinks($I, MainMenu_help::$_law_id, 'Platni razredi');
    }
    
    public function Profile(AcceptanceTester $I)
    {
        $I->wantTo('Profile - s: 23');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(Homepage_Common::$_top_bar_profile, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_top_bar_profile);
        $I->waitForElementVisible(MainMenu_help::$_top_bar_profile_field, Helper\Acceptance::$wait_medium);
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_profile_id, 'a', 'Poruke');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_profile_id, 'a', 'Zadaci');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_profile_id, 'a', 'Aktivnosti');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_profile_id, 'a', 'Teme');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_profile_id, 'a', 'Korisnička podešavanja');
        MainMenu_help::FirstLinksCheckText($I, MainMenu_help::$_profile_id, 'a', 'Moj tim');
    }
    
    public function NewRequest(AcceptanceTester $I)
    {
        $I->wantTo('NewRequest - s: 24');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(MainMenu_help::$_new_request, Helper\Acceptance::$wait_medium);
        $I->click(MainMenu_help::$_new_request);
        $I->waitForElementVisible(MainMenu_help::$_new_request_window, Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(MainMenu_help::$_new_request_titlebar
                ."/span[contains(text(),'".Homepage_Common::$_sima_string."')]", Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(MainMenu_help::$_new_request_titlebar
                ."/button[@title='Close']", Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(MainMenu_help::$_new_request_form_wrapper
                ."/div[contains(text(),'Novi zahtev')]", Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(MainMenu_help::$_new_request_save, Helper\Acceptance::$wait_medium);
        $I->click(MainMenu_help::$_new_request_titlebar."/button[@title='Close']");
        $I->waitForElementNotVisible(MainMenu_help::$_new_request_window, Helper\Acceptance::$wait_medium);
    }
    
    public function LogOut(AcceptanceTester $I)
    {
        $I->wantTo('LogOut - s: 26');
        $I->loginAsAdminUser($I);
        $I->waitForElementVisible(Homepage_Common::$_log_out, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_log_out);
        $I->waitForText('SIMA - Prijavite se', Helper\Acceptance::$wait_medium, "//div[@class='sima-login__title']/h1");
    }
}