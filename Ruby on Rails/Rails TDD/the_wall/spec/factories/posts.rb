FactoryBot.define do
  factory :post do
    message { "Message here!" }
    user { User.first }
  end
end
