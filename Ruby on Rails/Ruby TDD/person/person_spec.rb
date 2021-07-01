require_relative 'person'
RSpec.describe Person do
    it "can't initialize user without name" do 
        expect{Person.new}.to raise_error(ArgumentError)
    end
    
    it "can't change users name" do
        user = Person.new "Oscar"
        expect{user.name = "Eduardo"}.to raise_error(NoMethodError)
    end  
end