class Blog < ApplicationRecord
    validates :name, :description, presence: true

    has_many :posts
    has_many :owners
    has_many :users, through: :owners
    has_many :comments, as: :commentable
end
