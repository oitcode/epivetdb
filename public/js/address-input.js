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

/* Disable all district options. */
function disableAllDistricts()
{
    /* Disable all district dropdowns.*/
    $("select[id^='district_list_']").each(function() {
        $(this).prop('disabled', true);
    });
}

/* Disable all local body options. */
function disableAllLb()
{
    /* Disable all local body dropdowns.*/
    $("select[id^='lb_list_']").each(function() {
        $(this).prop('disabled', true);
    });
}

$( document ).ready(function() {
    console.log("Welcome to epivet DB app");
    hideDistrictAndLb();

    /* When state is selected. */
    $("#state_name").change(function() {
        /* Hide all district and local body dropdowns. */
        hideDistrictAndLb();

        /* Disable all district and local body selects. */
        disableAllDistricts();
        disableAllLb();

        /* Enable, deselect, and show the one that is needed. */
        listName = '#district_list_' + $("#state_name").val();
        $(listName).prop('disabled', false);
        $(listName + " option:selected").prop('selected', false);
        $(listName).show();
    });

    /* When district is selected. */
    $("select[id^='district_list_']").change(function() {
        /* Hide all local body dropdowns.*/
        $("select[id^='lb_list_']").each(function() {
            $(this).hide();
        });
        disableAllLb();

        /* Enable, deselect, and show the one that is needed. */
        listName = '#lb_list_' + $(this).val();
        $(listName).prop('disabled', false);
        $(listName + " option:selected").prop('selected', false);
        $(listName).show();
    });
});
