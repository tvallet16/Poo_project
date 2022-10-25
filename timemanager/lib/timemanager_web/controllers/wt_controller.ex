defmodule TimemanagerWeb.WTController do
  use TimemanagerWeb, :controller

  alias Timemanager.WTContext
  alias Timemanager.WTContext.WT

  action_fallback TimemanagerWeb.FallbackController

  def index(conn, _params) do
    workingtimes = WTContext.list_workingtimes()
    render(conn, "index.json", workingtimes: workingtimes)
  end

  def create(conn, %{"wt" => wt_params, "id" => user_id}) do
    with {:ok, %WT{} = wt} <- WTContext.create_wt(wt_params, user_id) do
      render(conn, "show.json", wt: wt)
    end
    #   conn
    #   |> put_status(:created)
    #   |> put_resp_header("location", Routes.wt_path(conn, :show, wt))
    #   |> render("show.json", wt: wt)
    # end
  end

  def getOneByUser(conn, %{"userID" => userId, "id" => id}) do
    wt = WTContext.getOneByUser!(userId, id)
    render(conn, "show.json", wt: wt)
  end

  def getAllByUser(conn, %{"userID" => userId, "start" => date_start, "end" => date_end}) do
    workingtimes = WTContext.getAllByUserAndDate!(userId, date_start, date_end)
    render(conn, "index.json", workingtimes: workingtimes)
  end

  def getAllByUser(conn, %{"userID" => userId}) do
    workingtimes = WTContext.getAllByUser!(userId)
    render(conn, "index.json", workingtimes: workingtimes)
  end

  # def show(conn, %{"id" => id}) do
  #   wt = WTContext.get_wt!(id)
  #   render(conn, "show.json", wt: wt)
  # end

  def update(conn, %{"id" => id, "wt" => wt_params}) do
    wt = WTContext.get_wt!(id)

    with {:ok, %WT{} = wt} <- WTContext.update_wt(wt, wt_params) do
      render(conn, "show.json", wt: wt)
    end
  end

  def delete(conn, %{"id" => id}) do
    wt = WTContext.get_wt!(id)

    with {:ok, %WT{}} <- WTContext.delete_wt(wt) do
      send_resp(conn, :no_content, "")
    end
  end
end
