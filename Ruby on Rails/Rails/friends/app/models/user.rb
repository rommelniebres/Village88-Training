class User < ApplicationRecord
    validates :first_name, :last_name, presence: true

    has_many :friendships
    has_many :friends, through: :friendships
end
