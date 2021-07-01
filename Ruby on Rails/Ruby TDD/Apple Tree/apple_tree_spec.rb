require_relative 'apple_tree'
RSpec.describe AppleTree do
  it "has a getter and setter for age attribute" do
    apple_tree = AppleTree.new
    apple_tree.age = 2
    expect(apple_tree.age).to eq(2)
  end

  it "has a getter but no setter for height attribute" do
    apple_tree = AppleTree.new
    expect(apple_tree.height).to eq(20)
    expect{apple_tree.height = 2}.to raise_error(NoMethodError)
  end

  it "has a getter but no setter for apple_count attribute" do
    apple_tree = AppleTree.new
    expect(apple_tree.apple_count).to eq(200)
    expect{apple_tree.apple_count = 2000}.to raise_error(NoMethodError)
  end

  it "has a method called 'year_gone_by'" do
    #increment the ff: age by 1, height by 10% and apple count by 2
    apple_tree = AppleTree.new
    apple_tree.age = 2
    apple_tree.year_gone_by
    expect(apple_tree.age).to eq(3)
    expect(apple_tree.height).to eq(22)
    expect(apple_tree.apple_count).to eq(202)
  end

  it "has a method called 'pick_apples'" do
    #takes all the apple of the tree
    apple_tree = AppleTree.new
    apple_tree.age = 3
    apple_tree.pick_apples
    expect(apple_tree.apple_count).to eq(0)
  end
end