require_relative 'project'
RSpec.describe Project do
  it "has a getter and setter for name attribute" do
    project = Project.new
    project.name = "Project Name"
    expect(project.name).to eq("Project Name")
  end
end