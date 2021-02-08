<div class="modal fade" id="exportFilter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Items to show</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <b>Main</b>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemAddress" data-category="main" name="address" value="1" checked>
                            <label class="form-check-label" for="itemAddress">Address</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemDesc" data-category="main" name="description" value="1" checked>
                            <label class="form-check-label" for="itemDesc">Description</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemMetro" data-category="main" name="metro" value="1" checked>
                            <label class="form-check-label" for="itemMetro">Metro</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <b>Commercial characteristics</b>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemMainRent" data-category="commercial" name="main_rent" value="1" checked>
                            <label class="form-check-label" for="itemMainRent">Main Rent</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemOppExpenses" data-category="commercial" name="opp_expenses" value="1" checked>
                            <label class="form-check-label" for="itemOppExpenses">Operating expenses</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemVat" name="vat" data-category="commercial" value="1" checked>
                            <label class="form-check-label" for="itemVat">VAT</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemBuildingType" data-category="commercial" name="building_type" value="1" checked>
                            <label class="form-check-label" for="itemBuildingType">Building type</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <b>Technical characteristics</b>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemLift" data-category="technical" name="lift" value="1" checked>
                            <label class="form-check-label" for="itemLift">Lift</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemUnitsCount" data-category="technical" name="units_count" value="1" checked>
                            <label class="form-check-label" for="itemUnitsCount">Units count</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemColumnsStep" data-category="technical" name="columns_step" value="1" checked>
                            <label class="form-check-label" for="itemColumnsStep">Columns step</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemConditioning" data-category="technical" name="conditioning" value="1" checked>
                            <label class="form-check-label" for="itemConditioning">Conditioning</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <b>General characteristics</b>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemTotalArea" data-category="general" name="total_area" value="1" checked>
                            <label class="form-check-label" for="itemTotalArea">Total area</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemFreeArea" data-category="general" name="free_area" value="1" checked>
                            <label class="form-check-label" for="itemFreeArea">Free area</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemStoreys" data-category="general" name="storeys" value="1" checked>
                            <label class="form-check-label" for="itemStoreys">Storeys</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemGenBuildingType" data-category="general" name="building_type" value="1" checked>
                            <label class="form-check-label" for="itemGenBuildingType">Building type</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-items" type="checkbox" id="itemInfrastructure" data-category="general" name="infrastructure" value="1" checked>
                            <label class="form-check-label" for="itemInfrastructure">Infrastructure</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="generatePres">Generate</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\prema\resources\views/components/exports/export-filter.blade.php ENDPATH**/ ?>