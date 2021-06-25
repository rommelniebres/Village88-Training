require "test_helper"

class TimesControllerTest < ActionDispatch::IntegrationTest
  test "should get main" do
    get times_main_url
    assert_response :success
  end
end
