/* Javascript and jquery for address input functionality. */


/* Hide district and local bodies dropdowns. */
function hideDistrictAndLb()
{
    /* Hide all district dropdowns.*/
    $("select[id^='district_list_']").each(function() {
        $(this).hide();
    });
    /* Hide all local body dropdowns.*/
    $("select[id^='lb_list_']").each(function() {
        $(this).hide();
    });
}

/* Unselect all district options. */
function unselectAllDistricts()
{
    ; 
}

/* Unselect all local body options. */
function unselectAllLb()
{
    ;
}

$( document ).ready(function() {
    console.log("Welcome to epivet DB app");
    hideDistrictAndLb();

    /* When state is selected. */
    $("#state_name").change(function() {
        hideDistrictAndLb();
        // unselectAllDistricts();
        // unselectAllLb();

        /* Show the one that is needed. */
        listName = '#district_list_' + $("#state_name").val();
        $(listName + " option:selected").prop('selected', false);
        $(listName).show();
    });

    /* When district is selected. */
    $("select[id^='district_list_']").change(function() {
        /* Hide all local body dropdowns.*/
        $("select[id^='lb_list_']").each(function() {
            $(this).hide();
        });
        unselectAllLb();

        /* Show the one that is needed. */
        listName = '#lb_list_' + $(this).val();
        $(listName + " option:selected").prop('selected', false);
        $(listName).show();
    });
});
