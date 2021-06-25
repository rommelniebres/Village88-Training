require "test_helper"

class RpgsControllerTest < ActionDispatch::IntegrationTest
  test "should get farm" do
    get rpgs_farm_url
    assert_response :success
  end

  test "should get cave" do
    get rpgs_cave_url
    assert_response :success
  end

  test "should get casino" do
    get rpgs_casino_url
    assert_response :success
  end

  test "should get house" do
    get rpgs_house_url
    assert_response :success
  end
end
