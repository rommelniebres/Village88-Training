require "test_helper"

class ControlersControllerTest < ActionDispatch::IntegrationTest
  test "should get hello" do
    get controlers_hello_url
    assert_response :success
  end
end
