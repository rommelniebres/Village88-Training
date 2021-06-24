class Message < ApplicationRecord
    validates :message, presence: true, length: { minimum: 15 }
    validates :author, presence: true
    
    belongs_to :post
    belongs_to :user
    has_many :comments, as: :commentable
end
