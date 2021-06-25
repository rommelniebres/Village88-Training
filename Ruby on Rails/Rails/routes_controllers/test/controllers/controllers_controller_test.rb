require "test_helper"

class ControllersControllerTest < ActionDispatch::IntegrationTest
  test "should get index" do
    get controllers_index_url
    assert_response :success
  end
end
