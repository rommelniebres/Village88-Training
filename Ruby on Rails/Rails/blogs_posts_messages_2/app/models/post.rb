class Post < ApplicationRecord
    validates :title, :content, presence: true, length: { minimum: 7 }
    validates :content, presence: true

    belongs_to :blog
    belongs_to :user
    has_many :messages
    has_many :comments, as: :commentable
end
