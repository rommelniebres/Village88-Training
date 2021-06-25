require "test_helper"

class UsersControllerTest < ActionDispatch::IntegrationTest
  test "should get total" do
    get users_total_url
    assert_response :success
  end
end
