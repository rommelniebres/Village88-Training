class Post < ApplicationRecord
  belongs_to :user
  validates :message, presence: true, length: { minimum: 10 }
  validates :user, presence: true
end
