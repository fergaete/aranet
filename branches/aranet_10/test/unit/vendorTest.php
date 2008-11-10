<?php
if (!@constant('SF_APP')) {
    define('SF_APP', 'frontend');
}
include(dirname(__FILE__).'/../../plugins/sfModelTestPlugin/bootstrap/model-unit.php');

class vendorTest extends sfPropelTest
{
    public function test_vendor()
    {

        // User
        $user = new sfGuardUser();
        $user_profile = new sfGuardUserProfile();
        $user->addsfGuardUserProfileRelatedByUserId($user_profile);
        $user_profile->setFirstName('Joe');
        $user_profile->setLastName('Smith');
        $user->setUsername('bobbyjoe');
        $user->setPassword('bobbyjoe');
        $user->save();

        $joe = sfGuardUserPeer::getOneBy(sfGuardUserPeer::USERNAME, 'bobbyjoe');
        if ($joe->getProfile()) {
            $this->ok($joe, 'Joe exists!');
        } else {
            $this->fail($joe, 'Joe exists!');
        }

        // Budget
        $budget = new Budget();
        $budget->setBudgetTitle('test budget');
        $budget->setBudgetNumber(10);
        $budget->setBudgetDate('2007-10-10');
        $budget->setBudgetValidDate('2009-11-10'); // Borrador
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

        $budget->setProject($project);
        $budget->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        $this->ok($testBudget->getBudgetProjectId(), 'Test project associated with test budget!');

        // Vendor
        $vendor = new Vendor();
        $vendor->setVendorUniqueName('test vendor');
        $vendor->setVendorCompanyName('test vendor');
        $vendor->save();
        $testVendor = VendorPeer::getOneBy(VendorPeer::VENDOR_UNIQUE_NAME, 'test vendor');
        if ($testVendor) {
            $this->ok($testVendor, 'Test vendor sucessfully created!');
        } else {
            $this->fail('Test vendor fails!');
        }
        $expense = new ExpenseItem();
        $expense->setExpenseItemName('expense test');
        $expense->setExpensePurchaseDate('2007-10-10');
        $expense->setsfGuardUserRelatedByExpensePurchaseBy($joe);
        $expense->setExpenseItemBase(10);
        $expense->setExpenseItemTaxRate(10);
        $expense->setVendor($vendor);
        $expense->save();
        $testExpense = ExpenseItemPeer::getOneBy(ExpenseItemPeer::EXPENSE_ITEM_NAME, 'expense test');
        if ($testExpense) {
            $this->ok($testExpense, 'Test expense sucessfully created!');
        } else {
            $this->fail('Test expense fails!');
        }

        $expense->setBudget($testBudget);
        $expense->save();
        $testBudget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');

        $testExpense = ExpenseItemPeer::getOneBy(ExpenseItemPeer::EXPENSE_ITEM_NAME, 'expense test');
        if ($testExpense) {
            $this->ok($testExpense->getExpenseItemProjectId(), 'Test expense associated with project throught budget');
        } else {
            $this->fail('Test expense fail!');
        }
    }

    public function test_vendorDelete()
    {
        // User
        $joe = sfGuardUserPeer::getOneBy(sfGuardUserPeer::USERNAME, 'bobbyjoe');
        $user_id = $joe->getId();
        $joe->delete();
        $joe_del = sfGuardUserPeer::getOneBy(sfGuardUserPeer::USERNAME, 'bobbyjoe');
        sfPropelParanoidBehavior::disable();
        $joe2_del = sfGuardUserPeer::getOneBy(sfGuardUserPeer::USERNAME, 'bobbyjoe');
        $this->ok(!$joe_del && $joe2_del, 'Test user tagged as deleted!');
        sfPropelParanoidBehavior::enable();
        // User Profile
        $joeProfile_del = sfGuardUserProfilePeer::getOneBy(sfGuardUserProfilePeer::USER_ID, $user_id);
        sfPropelParanoidBehavior::disable();
        $joe2Profile_del = sfGuardUserProfilePeer::getOneBy(sfGuardUserProfilePeer::USER_ID, $user_id);
        $this->ok(!$joeProfile_del && $joe2Profile_del, 'Test profile tagged as deleted!');
        sfPropelParanoidBehavior::enable();
        // Budget
        $budget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        $budget->delete();
        $del_budget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        sfPropelParanoidBehavior::disable();
        $del2_budget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_budget && $del2_budget, 'Test budget sucessfully tagged as deleted!');
        // Project
        $project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        $project->delete();
        $del_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        sfPropelParanoidBehavior::disable();
        $del2_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_project && $del2_project, 'Test project sucessfully tagged as deleted!');

        // Vendor
        $vendor = VendorPeer::getOneBy(VendorPeer::VENDOR_UNIQUE_NAME, 'test vendor');
        $vendor->delete();
        $del_vendor = VendorPeer::getOneBy(VendorPeer::VENDOR_UNIQUE_NAME, 'test vendor');
        sfPropelParanoidBehavior::disable();
        $del2_vendor = VendorPeer::getOneBy(VendorPeer::VENDOR_UNIQUE_NAME, 'test vendor');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_vendor && $del2_vendor, 'Test vendor sucessfully tagged as deleted!');

        // Expense
        $expense = ExpenseItemPeer::getOneBy(ExpenseItemPeer::EXPENSE_ITEM_NAME, 'expense test');
        $expense->delete();
        $del_expense = ExpenseItemPeer::getOneBy(ExpenseItemPeer::EXPENSE_ITEM_NAME, 'expense test');
        sfPropelParanoidBehavior::disable();
        $del2_expense = ExpenseItemPeer::getOneBy(ExpenseItemPeer::EXPENSE_ITEM_NAME, 'expense test');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_expense && $del2_expense, 'Test expense sucessfully tagged as deleted!');

        $budget->forceDelete();
        sfPropelParanoidBehavior::disable();
        $del_budget = BudgetPeer::getOneBy(BudgetPeer::BUDGET_TITLE, 'test budget');
        $this->ok(!$del_budget, 'Test budget sucessfully deleted!');

        $project->forceDelete();
        sfPropelParanoidBehavior::disable();
        $del_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        $this->ok(!$del_project, 'Test project sucessfully deleted!');

        $vendor->forceDelete();
        $del_vendor = VendorPeer::getOneBy(VendorPeer::VENDOR_UNIQUE_NAME, 'test vendor');
        $this->ok(!$del_vendor, 'Test vendor sucessfully deleted!');

        $expense->forceDelete();
        $del_expense = ExpenseItemPeer::getOneBy(ExpenseItemPeer::EXPENSE_ITEM_NAME, 'expense test');
        $this->ok(!$del_expense, 'Test expense sucessfully deleted!');
    }

}

$test = new vendorTest();
$test->execute();
