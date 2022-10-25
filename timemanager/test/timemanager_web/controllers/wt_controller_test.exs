defmodule TimemanagerWeb.WTControllerTest do
  use TimemanagerWeb.ConnCase

  import Timemanager.WTContextFixtures

  alias Timemanager.WTContext.WT

  @create_attrs %{
    end: ~N[2022-10-23 15:15:00],
    start: ~N[2022-10-23 15:15:00]
  }
  @update_attrs %{
    end: ~N[2022-10-24 15:15:00],
    start: ~N[2022-10-24 15:15:00]
  }
  @invalid_attrs %{end: nil, start: nil}

  setup %{conn: conn} do
    {:ok, conn: put_req_header(conn, "accept", "application/json")}
  end

  describe "index" do
    test "lists all workingtimes", %{conn: conn} do
      conn = get(conn, Routes.wt_path(conn, :index))
      assert json_response(conn, 200)["data"] == []
    end
  end

  describe "create wt" do
    test "renders wt when data is valid", %{conn: conn} do
      conn = post(conn, Routes.wt_path(conn, :create), wt: @create_attrs)
      assert %{"id" => id} = json_response(conn, 201)["data"]

      conn = get(conn, Routes.wt_path(conn, :show, id))

      assert %{
               "id" => ^id,
               "end" => "2022-10-23T15:15:00",
               "start" => "2022-10-23T15:15:00"
             } = json_response(conn, 200)["data"]
    end

    test "renders errors when data is invalid", %{conn: conn} do
      conn = post(conn, Routes.wt_path(conn, :create), wt: @invalid_attrs)
      assert json_response(conn, 422)["errors"] != %{}
    end
  end

  describe "update wt" do
    setup [:create_wt]

    test "renders wt when data is valid", %{conn: conn, wt: %WT{id: id} = wt} do
      conn = put(conn, Routes.wt_path(conn, :update, wt), wt: @update_attrs)
      assert %{"id" => ^id} = json_response(conn, 200)["data"]

      conn = get(conn, Routes.wt_path(conn, :show, id))

      assert %{
               "id" => ^id,
               "end" => "2022-10-24T15:15:00",
               "start" => "2022-10-24T15:15:00"
             } = json_response(conn, 200)["data"]
    end

    test "renders errors when data is invalid", %{conn: conn, wt: wt} do
      conn = put(conn, Routes.wt_path(conn, :update, wt), wt: @invalid_attrs)
      assert json_response(conn, 422)["errors"] != %{}
    end
  end

  describe "delete wt" do
    setup [:create_wt]

    test "deletes chosen wt", %{conn: conn, wt: wt} do
      conn = delete(conn, Routes.wt_path(conn, :delete, wt))
      assert response(conn, 204)

      assert_error_sent 404, fn ->
        get(conn, Routes.wt_path(conn, :show, wt))
      end
    end
  end

  defp create_wt(_) do
    wt = wt_fixture()
    %{wt: wt}
  end
end
