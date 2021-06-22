# 1.    BankAccount should have a method that returns a user's account number, 
#           account number should be generated by a private method, account number should be random
# 2.    BankAccount should have a method that returns the user's checking account balance
# 3.    BankAccount should have a method that returns the user's saving account balance
# 4.    BankAccount should allow a user to deposit money into either their checking or saving account
# 5.    BankAccount should allow a user to withdraw money from one of their accounts, 
#           return an error if there are insufficient funds
# 6.    BankAccount should allow the user to view the total amount of money they have at the bank
# 7.    BankAccount should track how many accounts the bank currently has
# 8.    Add an interest_rate attribute that is not accessible by the user. Set it to 0.01
# 9.    BankAccount should have a method called account_information that displays the users 
#           account number, total money, checking account balance, saving account balance and interest rate
# 10.   A user should not be able to set any attributes from the BankAccount class
class BankAccount
    @@accounts_counter = 0
    def initialize
        @@accounts_counter += 1
        @account_number = ''
        @checking_balance = 0
        @saving_balance = 0
        @total = 0
        puts "Total number of accounts #{@@accounts_counter}"
    end
    def account_information
        puts "Account number: #{get_account_number}"
        puts "Total balance: #{get_total_balance}"
        puts "Checking account balance: #{get_checking_balance}"
        puts "Saving account balance: #{get_saving_balance}"
        puts "Interest: #{get_interest_rate}"
    end
    def get_account_number
        @account_number = account_number_generator
    end

    def get_checking_balance
        @checking_balance
    end

    def get_saving_balance
        @saving_balance
    end

    def deposit_checking_balance param
        @checking_balance += param
    end

    def deposit_saving_balance param
        @saving_balance += param
    end

    def withdraw_checking_balance param
        if param > @checking_balance
            puts "error: insufficient funds"
        else
            @checking_balance -= param
            puts "Successful withdraw: your balance now is #{@checking_balance}"
        end
    end

    def withdraw_saving_balance param
        if param > @saving_balance
            "error: insufficient funds"
        else
            @saving_balance -= param
            "Successful withdraw: your balance now is #{@saving_balance}"
        end
    end

    def get_total_balance
        @total = @saving_balance + @checking_balance
    end

    private
    def account_number_generator
        rand(99999999999999999)
    end

    def get_interest_rate
        @interest_rate = 0.01
    end
end


user = BankAccount.new
user.deposit_checking_balance(60)
user.deposit_saving_balance(60)
user.withdraw_checking_balance(20)
user.withdraw_saving_balance(20)
puts user.account_information