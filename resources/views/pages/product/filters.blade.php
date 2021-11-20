

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form>
                    <input type="hidden" class="d-none" name="filter" value="true" hidden>
                    <div class="row">

                        <div class="col-sm">
                            <div class="form-group">
                                <label class="form-label" for="start_price"> Start Price </label>
                                <select name="start_price" id="start_price" class="form-control form-select custom-select select2" data-toggle="select2">
                                    <option value="0" > Select </option>
                                    @foreach($prices as $price)
                                        <option value={{$price}}> ${{$price}} </option>
                                    @endforeach()
                                </select>
                            </div>

                        </div>

                        <div class="col-sm">
                            <div class="form-group">
                                <label class="form-label" for="end_price"> End Price </label>
                                <select disabled name="end_price" id="end_price" class="form-control form-select custom-select select2" data-toggle="select2">
                                    <option value="0" > Select </option>
                                    @foreach($prices as $price)
                                        <option value={{$price}}> ${{$price}} </option>
                                    @endforeach()
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm mt-4">
                            <button type="button"
                                    class="btn btn-sm btn-primary apply-dt-filters mt-2"
                                    onclick="get_query_params()"> Apply </button>

                            <button type="button"
                                    class="btn btn-sm btn-secondary clear-dt-filters mt-2"> Clear </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
