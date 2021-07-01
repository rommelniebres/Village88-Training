require 'rails_helper'

RSpec.describe Post, type: :model do
  context "With valid attributes" do 
    it "should save" do 
      expect(build(:post, user: build(:user))).to be_valid
    end
  end
  context "With invalid attributes" do 
    it "should not save if message field is blank" do
      expect(build(:post, message: '',user: build(:user))).to be_invalid
    end
    it "should not save if user field is blank" do
      expect(build(:post, message: 'Message here!',user: nil)).to be_invalid
    end
    it "should not save if message is shorter than 10 char" do
      expect(build(:post, message: "nine nine")).to be_invalid
    end
  end
end
