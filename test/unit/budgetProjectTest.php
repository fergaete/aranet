<?php
if (!@constant('SF_APP')) {
    define('SF_APP', 'frontend');
}
include(dirname(__FILE__).'/../../plugins/sfModelTestPlugin/bootstrap/model-unit.php');

class budgetProjectTest extends sfPropelTest
{
    public function test_budgetProject()
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

        // Project
        $project = new Project();
        $project->setProjectName('test project');
        $project->save();
        $testProject = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        if ($testProject) {
            $this->ok($testProject, 'Test project sucessfully created!');
        } else {
            $this->fail('Test project fails!');
        }

        $project->setClient($client);
        $project->save();

        // Budget
        $budget = new Budget();
        $budget->setBudgetTitle('test budget');
        $budget->setBudgetNumber(10);
        $budget->setBudgetDate('2007-10-10');
        $budget->setBudgetValidDate('2008-11-10'); // Borrador
        $budget->setBudgetStatusId(2); // Activo
        $budget->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok($testBudget, 'Test budget sucessfully created!');
        } else {
            $this->fail('Test budget fails!');
        }
        $this->ok($testBudget->getBudgetStatusId() == 2, 'Test budget save with status ' . $testBudget->getBudgetStatus());

        // Budget Items
        sfConfig::set('sf_model_margin', 'costs');
        $bitem = new BudgetItem();
        $bitem->setItemQuantity(10);
        $bitem->setItemCost(10);
        $bitem->setItemMargin(5);
        $bitem->setItemTaxRate(16);
        $budget->addBudgetItem($bitem);
        $bitem->save();
        // Check budget item retail price
        $testBudgetItems = BudgetItemPeer::getBy(BudgetItemPeer::ITEM_BUDGET_ID, $budget->getId());
        if ($testBudgetItems) {
            $this->ok(count($testBudgetItems) == 1, 'Test budget item sucessfully created!');
            $this->ok($testBudgetItems[0]->getItemRetailPrice(), 'Test budget item retail price in cost mode successfully update to ' . $testBudgetItems[0]->getItemRetailPrice());
        } else {
            $this->fail('Test budget item fails!');
        }
        $budget->save();

        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok($testBudget->getBudgetTotalAmount() != 0, 'Test budget total amount: ' . $testBudget->getBudgetTotalAmount());
            $this->ok($testBudget->getBudgetTotalCost() != 0, 'Test budget total costs: ' . $testBudget->getBudgetTotalCost());
            $this->ok($testBudget->getBudgetAverageMargin() != 0, 'Test budget total average margin in costs mode: ' . $testBudget->getBudgetAverageMargin());
        } else {
            $this->fail('Test budget fails!');
        }

        $budget->setProject($project);
        $budget->save();

        $budget->setBudgetStatusId(3); // Aceptado
        $budget->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        if ($testBudget) {
            $this->ok($testBudget->getBudgetStatusId() == 3, 'Test budget updated to status ' . $testBudget->getBudgetStatus());
        } else {
            $this->fail('Test budget fails!');
        }

        $budget->setProject(null);
        $budget->save();

    }

    public function test_budgetProjectDelete()
    {
        // Client
        $client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        $client->delete();
        $del_client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        sfPropelParanoidBehavior::disable();
        $del2_client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_client && $del2_client, 'Test client sucessfully tagged as deleted!');

        // Project
        $project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        $project->delete();
        $del_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        sfPropelParanoidBehavior::disable();
        $del2_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_project && $del2_project, 'Test project sucessfully tagged as deleted!');

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

        $project->forceDelete();
        sfPropelParanoidBehavior::disable();
        $del_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        $this->ok(!$del_project, 'Test project sucessfully deleted!');

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

$test = new budgetProjectTest();
$test->execute();
