class Secret < ApplicationRecord
  belongs_to :user
  has_many :likes, through: :user
  has_many :users, through: :likes
end
