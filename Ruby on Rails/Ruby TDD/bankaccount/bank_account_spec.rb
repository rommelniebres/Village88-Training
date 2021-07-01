require_relative 'bank_account'
RSpec.describe BankAccount do
    before(:each) do
        # updated this block to create two projects
        @user1 = BankAccount.new
        @user2 = BankAccount.new
    end
    it 'has a getter for checking account balance' do
        @user1.deposit_checking_balance(60)
        expect(@user1.get_checking_balance).to eq(60)
    end 

    it 'has a getter for total account balance' do
        @user1.deposit_checking_balance(60)
        @user1.deposit_saving_balance(60)
        expect(@user1.get_total_balance).to eq(120)
    end 

    it 'has a method to withdraw cash' do
        @user1.deposit_checking_balance(60)
        @user1.deposit_saving_balance(60)
        expect(@user1.withdraw_checking_balance(30)).to eq(true)
    end 

    it 'raise error if withdraw value is greater than total balance' do
        @user1.deposit_checking_balance(60)
        @user1.deposit_saving_balance(60)
        expect(@user1.withdraw_checking_balance(150)).to eq(false)
    end 

    it 'will raise an error when trying to get total bank accounts number' do
        expect{@user1.accounts_counter}.to raise_error(NoMethodError)
    end 

    it 'will raise an error when trying to set the interest' do
        expect{@user1.interest_rate}.to raise_error(NoMethodError)
        expect{@user1.get_interest_rate}.to raise_error(NoMethodError)
    end 
end