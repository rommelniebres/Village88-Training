# This makes sure that we set our environment to test instead of development. This is so that we connect to our testing database 
# instead of our development database. 
ENV['RAILS_ENV'] ||= 'test'
require File.expand_path('../../config/environment', __FILE__)
abort("The Rails environment is running in production mode!") if Rails.env.production?
require 'spec_helper'
require 'rspec/rails'
# This is set so that our testing database matches our development database after migrations. 
ActiveRecord::Migration.maintain_test_schema!
RSpec.configure do |config|
  # Includes Factory Bot into our testing environment
  config.include FactoryBot::Syntax::Methods
  # This is set so that the test database is cleared after our tests are complete. 
  config.use_transactional_fixtures = true
  config.infer_spec_type_from_file_location!
  config.filter_rails_from_backtrace!
end