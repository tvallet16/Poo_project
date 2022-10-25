defmodule TimemanagerWeb.ClockController do
  use TimemanagerWeb, :controller

  alias Timemanager.ClockContext
  alias Timemanager.ClockContext.Clock

  action_fallback TimemanagerWeb.FallbackController

  def create(conn, %{"clock" => clock_params, "id" => user_id}) do
    with {:ok, %Clock{} = clock} <- ClockContext.create_clock(clock_params, user_id) do
      render(conn, "show.json", clock: clock)
      # conn
      # |> put_status(:created)
      # |> put_resp_header("location", Routes.clock_path(conn, :show, clock))
      # |> render("show.json", clock: clock)
    end
  end

  def show(conn, %{"id" => id}) do
    clock = ClockContext.get_clock_by_user!(id)
    render(conn, "index.json", clocks: clock)
  end

end
