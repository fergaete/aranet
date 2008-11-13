<?php
if (!@constant('SF_APP')) {
    define('SF_APP', 'frontend');
}
include(dirname(__FILE__).'/../../plugins/sfModelTestPlugin/bootstrap/model-unit.php');

class budgetItemTest extends sfPropelTest
{
    public function test_budgetItem()
    {
        // Client
        $client = new Client();
        $client->setClientUniqueName('test client');
        $client->setClientCompanyName('test client');
        $client->save();
        $testClient = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        if ($testClient) {
            $this->ok($testClient, 'Test client sucessfully created!');
        } else {
            $this->fail('Test client fails!');
        }

        // Budget
        $budget = new Budget();
        $budget->setBudgetTitle('test budget');
        $budget->setBudgetNumber(10);
        $budget->setBudgetDate('2007-10-10');
        $budget->setBudgetValidDate('2008-11-10'); // Activo
        $budget->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok($testBudget, 'Test budget sucessfully created!');
        } else {
            $this->fail('Test budget fails!');
        }
        $this->ok($testBudget->getBudgetStatusId() == 1, 'Test budget save with status ' . $testBudget->getBudgetStatus());

        // Budget Items
        sfConfig::set('sf_model_margin', 'costs');
        $bitem = new BudgetItem();
        $bitem->setItemQuantity(10);
        $bitem->setItemCost(10);
        $bitem->setItemMargin(5);
        $bitem->setItemTaxRate(16);
        $budget->addBudgetItem($bitem);
        $bitem->save();
        $bitem = new BudgetItem();
        $bitem->setItemQuantity(10);
        $bitem->setItemMargin(5);
        $bitem->setItemCost(10);
        $bitem->setItemTaxRate(16);
        $budget->addBudgetItem($bitem);
        $bitem->save();
        $bitem = new BudgetItem();
        $bitem->setItemQuantity(10);
        $bitem->setItemCost(10);
        $bitem->setItemRetailPrice(10.5);
        $bitem->setItemTaxRate(16);
        $budget->addBudgetItem($bitem);
        $bitem->save();
        $bitem = new BudgetItem();
        $bitem->setItemQuantity(10);
        $bitem->setItemRetailPrice(10.5);
        $bitem->setItemCost(10);
        $bitem->setItemTaxRate(16);
        $budget->addBudgetItem($bitem);
        $bitem->save();
        $bitem = new BudgetItem();
        $bitem->setItemQuantity(10);
        $bitem->setItemRetailPrice(10.5);
        $bitem->setItemMargin(5);
        $bitem->setItemTaxRate(16);
        $budget->addBudgetItem($bitem);
        $bitem->save();
        $bitem = new BudgetItem();
        $bitem->setItemQuantity(10);
        $bitem->setItemMargin(5);
        $bitem->setItemRetailPrice(10.5);
        $bitem->setItemTaxRate(16);
        $budget->addBudgetItem($bitem);
        $bitem->save();
        sfConfig::set('sf_model_margin', 'ventas');
        $bitem2 = new BudgetItem();
        $bitem2->setItemQuantity(10);
        $bitem2->setItemCost(10);
        $bitem2->setItemMargin(5);
        $bitem2->setItemTaxRate(16);
        $budget->addBudgetItem($bitem2);
        $bitem2->save();
        $bitem2 = new BudgetItem();
        $bitem2->setItemQuantity(10);
        $bitem2->setItemMargin(5);
        $bitem2->setItemCost(10);
        $bitem2->setItemTaxRate(16);
        $budget->addBudgetItem($bitem2);
        $bitem2->save();
        $bitem2 = new BudgetItem();
        $bitem2->setItemQuantity(10);
        $bitem2->setItemRetailPrice(10.53);
        $bitem2->setItemCost(10);
        $bitem2->setItemTaxRate(16);
        $budget->addBudgetItem($bitem2);
        $bitem2->save();
        $bitem2 = new BudgetItem();
        $bitem2->setItemQuantity(10);
        $bitem2->setItemCost(10);
        $bitem2->setItemRetailPrice(10.53);
        $bitem2->setItemTaxRate(16);
        $budget->addBudgetItem($bitem2);
        $bitem2->save();
        $bitem2 = new BudgetItem();
        $bitem2->setItemQuantity(10);
        $bitem2->setItemMargin(5);
        $bitem2->setItemRetailPrice(10.53);
        $bitem2->setItemTaxRate(16);
        $budget->addBudgetItem($bitem2);
        $bitem2->save();
        $bitem2 = new BudgetItem();
        $bitem2->setItemQuantity(10);
        $bitem2->setItemRetailPrice(10.53);
        $bitem2->setItemMargin(5);
        $bitem2->setItemTaxRate(16);
        $budget->addBudgetItem($bitem2);
        $bitem2->save();
        // Check budget item retail price
        $testBudgetItems = BudgetItemPeer::getBy(BudgetItemPeer::ITEM_BUDGET_ID, $budget->getId());
        if ($testBudgetItems) {
            $this->ok(count($testBudgetItems) == 12, 'Test budget item sucessfully created!');
            $this->ok($testBudgetItems[0]->getItemRetailPrice(), 'Test budget item retail price in cost mode successfully update to ' . $testBudgetItems[0]->getItemRetailPrice());
            $this->ok($testBudgetItems[1]->getItemRetailPrice(), 'Test budget item retail price in cost mode successfully update to ' . $testBudgetItems[1]->getItemRetailPrice());
            $this->ok($testBudgetItems[2]->getItemRetailPrice(), 'Test budget item margin in cost mode successfully update to ' . $testBudgetItems[2]->getItemMargin());
            $this->ok($testBudgetItems[3]->getItemRetailPrice(), 'Test budget item margin in cost mode successfully update to ' . $testBudgetItems[3]->getItemMargin());
            $this->ok($testBudgetItems[4]->getItemRetailPrice(), 'Test budget item cost in cost mode successfully update to ' . $testBudgetItems[4]->getItemCost());
            $this->ok($testBudgetItems[5]->getItemRetailPrice(), 'Test budget item cost in cost mode successfully update to ' . $testBudgetItems[5]->getItemCost());
            $this->ok($testBudgetItems[6]->getItemRetailPrice(), 'Test budget item retail price in ventas mode successfully update to ' . $testBudgetItems[6]->getItemRetailPrice());
            $this->ok($testBudgetItems[7]->getItemRetailPrice(), 'Test budget item retail price in ventas mode successfully update to ' . $testBudgetItems[7]->getItemRetailPrice());
            $this->ok($testBudgetItems[8]->getItemRetailPrice(), 'Test budget item margin in ventas mode successfully update to ' . $testBudgetItems[8]->getItemMargin());
            $this->ok($testBudgetItems[9]->getItemRetailPrice(), 'Test budget item margin in ventas mode successfully update to ' . $testBudgetItems[9]->getItemMargin());
            $this->ok($testBudgetItems[10]->getItemRetailPrice(), 'Test budget item cost in ventas mode successfully update to ' . $testBudgetItems[10]->getItemCost());
            $this->ok($testBudgetItems[11]->getItemRetailPrice(), 'Test budget item cost in ventas mode successfully update to ' . $testBudgetItems[11]->getItemCost());
        } else {
            $this->fail('Test budget item fails!');
        }
        $budget->save();

        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok($testBudget->getBudgetTotalAmount(), 'Test budget total amount: ' . $testBudget->getBudgetTotalAmount());
            $this->ok($testBudget->getBudgetTotalCost(), 'Test budget total costs: ' . $testBudget->getBudgetTotalCost());
            $this->ok($testBudget->getBudgetAverageMargin(), 'Test budget total average margin in ventas mode: ' . $testBudget->getBudgetAverageMargin());
            sfConfig::set('sf_model_margin', 'costs');
            $this->ok($testBudget->getBudgetAverageMargin(), 'Test budget total average margin in costs mode: ' . $testBudget->getBudgetAverageMargin());
        } else {
            $this->fail('Test budget fails!');
        }

        $budget->setClient($client);
        $budget->save();

        $budget->setBudgetStatusId(2); // Activo
        $budget->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok($testBudget->getBudgetStatusId() == 2, 'Test budget updated to status ' . $testBudget->getBudgetStatus());
        } else {
            $this->fail('Test budget fails!');
        }

        $budget->setBudgetStatusId(3); // Aceptado
        $budget->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok($testBudget->getBudgetStatusId() == 3, 'Test budget updated to status ' . $testBudget->getBudgetStatus());
        } else {
            $this->fail('Test budget fails!');
        }

        $budget->setBudgetStatusId(4); // Rechazado
        $budget->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok($testBudget->getBudgetStatusId() == 4, 'Test budget updated to status ' . $testBudget->getBudgetStatus());
        } else {
            $this->fail('Test budget fails!');
        }

        $budget->setBudgetStatusId(5); // Caducado
        $budget->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok($testBudget->getBudgetStatusId() == 5, 'Test budget updated to status ' . $testBudget->getBudgetStatus());
        } else {
            $this->fail('Test budget fails!');
        }

        $budget->setBudgetValidDate('2008-10-10'); // Pasar a Borrador
        $budget->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok($testBudget->getBudgetStatusId() == 1, 'Test budget updated to status ' . $testBudget->getBudgetStatus());
        } else {
            $this->fail('Test budget fails!');
        }

        $budget->setBudgetValidDate('2005-10-10'); // Pasar a caducado
        $budget->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok($testBudget->getBudgetStatusId() == 5, 'Test budget updated to status ' . $testBudget->getBudgetStatus());
        } else {
            $this->fail('Test budget fails!');
        }

        $budget->setBudgetStatusId(3); // Aceptado
        $budget->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok($testBudget->getBudgetStatusId() == 3, 'Test budget updated to status ' . $testBudget->getBudgetStatus());
            $this->ok($testBudget->getBudgetApprovedDate(), 'Test budget updated to approved date ' . $testBudget->getBudgetApprovedDate());
        } else {
            $this->fail('Test budget fails!');
        }

        $budget->setClient(null); // Desvincular de cliente
        $budget->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok(!$testBudget->getBudgetClientId(), 'Test budget without associated client');
        } else {
            $this->fail('Test budget fails!');
        }

        $budget->setClient($client);
        $budget->save();

        // Client 2
        $client2 = new Client();
        $client2->setClientUniqueName('test client 2');
        $client2->setClientCompanyName('test client 2');
        $client2->save();
        $testClient2 = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client 2');
        if ($testClient2) {
            $this->ok($testClient2, 'Test client 2 sucessfully created!');
        } else {
            $this->fail('Test client fails!');
        }

        $budget->setClient($testClient2); // Change client
        $budget->save();

    }

    public function test_budgetItemDelete()
    {
        // Client
        $client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        $client->delete();
        // Client 2
        $client2 = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client 2');
        $client2->delete(); // Really delete (Paranoid bug?)
        $del_client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        $del_client2 = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client 2');
        sfPropelParanoidBehavior::disable();
        $del2_client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_client && $del2_client, 'Test client sucessfully tagged as deleted!');
        $del2_client2 = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client 2');
        $this->ok(!$del_client2 && $del2_client2, 'Test client 2 sucessfully tagged as deleted!');

        // Budget
        $budget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        $budget->delete();
        $del_budget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        sfPropelParanoidBehavior::disable();
        $del2_budget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_budget && $del2_budget, 'Test budget sucessfully tagged as deleted!');

        // BudgetItems
        $c = new Criteria();
        $bitems = BudgetItemPeer::getBy(BudgetItemPeer::ITEM_BUDGET_ID, $budget->getId());
        $this->ok($bitems, 'Budget items associated with budget object not deleted!');

        $client->forceDelete();
        sfPropelParanoidBehavior::disable();
        $del_client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        $this->ok(!$del_client, 'Test client sucessfully deleted!');

        //$client2->forceDelete();
        sfPropelParanoidBehavior::disable();
        $del_client2 = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client 2');
        $this->ok(!$del_client2, 'Test client 2 sucessfully deleted!');

        $budget->forceDelete();
        sfPropelParanoidBehavior::disable();
        $del_budget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        $this->ok(!$del_budget, 'Test budget sucessfully deleted!');

        // BudgetItems
        $c = new Criteria();
        $bitems = BudgetItemPeer::getBy(BudgetItemPeer::ITEM_BUDGET_ID, $budget->getId());
        $this->ok(!$bitems, 'Budget items associated with budget object successfully deleted!');

    }

}

$test = new budgetItemTest();
$test->execute();
