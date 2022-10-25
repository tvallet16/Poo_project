defmodule TimemanagerWeb.WTView do
  use TimemanagerWeb, :view
  alias TimemanagerWeb.WTView
  alias TimemanagerWeb.UserView

  def render("index.json", %{workingtimes: workingtimes}) do
    %{data: render_many(workingtimes, WTView, "wt.json")}
  end

  def render("show.json", %{wt: wt}) do
    %{data: render_one(wt, WTView, "wt.json")}
  end

  def render("wt.json", %{wt: wt}) do
    %{
      id: wt.id,
      start: wt.start,
      end: wt.end,
      user: UserView.render("user.json", %{user: wt.user})
    }
  end
end
