class User < ApplicationRecord
    validates :first_name, :last_name, :email_address, presence: true, length: {minimum: 2}
    validates :age, presence: true, numericality: {only_integer: true, greater_than_or_equal_to: 10, less_than_or_equal_to: 150}
end
