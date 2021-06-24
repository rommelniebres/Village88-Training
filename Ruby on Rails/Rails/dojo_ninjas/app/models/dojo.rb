class Dojo < ApplicationRecord
    has_many :ninjas
    validates :name, :city, presence: true 
    validates :state, presence: true, length: { minimum: 2 }

    before_destroy :destroy_ninjas  #9 answer

    private
        def destroy_ninjas
            self.ninjas.destroy_all
        end
end
   
# Dojo.second.ninjas.select(:first_name).order(created_at: :desc)