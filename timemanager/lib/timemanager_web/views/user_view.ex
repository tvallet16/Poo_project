defmodule TimemanagerWeb.UserView do
  use TimemanagerWeb, :view
  alias TimemanagerWeb.{UserView, ClockView, WTView}

  def render("index.json", %{users: users}) do
    %{data: render_many(users, UserView, "user.json")}
  end

  def render("show.json", %{user: user}) do
    %{data: render_one(user, UserView, "user.json")}
  end

  def render("user.json", %{user: user}) do
    %{
      id: user.id,
      username: user.username,
      email: user.email,
      # clocks: ClockView.render("index.json", %{clocks: user.clocks}),
      # workingtimes: WTView.render("index.json", %{workingtimes: user.workingtimes})
    }
  end
end
