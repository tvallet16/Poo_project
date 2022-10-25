defmodule TimemanagerWeb.ClockView do
  use TimemanagerWeb, :view
  alias TimemanagerWeb.ClockView
  alias TimemanagerWeb.UserView

  def render("index.json", %{clocks: clocks}) do
    %{data: render_many(clocks, ClockView, "clock.json", as: :clock)}
  end

  def render("show.json", %{clock: clock}) do
    %{data: render_one(clock, ClockView, "clock.json")}
  end

  def render("clock.json", %{clock: clock}) do
    %{
      id: clock.id,
      time: clock.time,
      status: clock.status,
      user: UserView.render("user.json", %{user: clock.user})
    }
  end
end
