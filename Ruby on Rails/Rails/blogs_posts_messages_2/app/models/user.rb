class User < ApplicationRecord
    EMAIL_REGEX = /\A([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]+)\z/i
    validates :first_name, :last_name, presence: true, length: { in: 2..20 }
    validates :email_address, presence: true, uniqueness: { case_sensitive: false }, format: { with: EMAIL_REGEX }

    before_save :downcase_email_address
    
    has_many :messages
    has_many :posts
    has_many :owners
    has_many :blogs, through: :owners
    has_many :comments, as: :commentable
    private
        def downcase_email_address
            self.email_address.downcase!
        end
end
