
var TotalRecord_Temp, PageSize_Temp, NumbersPerPage_Temp, CurrentPageIndex_Temp, ContainerDivID_Temp;
var TotalPages = 0;
var prevClass, NextClass, ActiveIndex;
var Count = 0, LoopCount, StartPageNo = 0, CurrentPageNo, FirstNo = 0;
function CreateCustomPagging(TotalRecord, PageSize, NumbersPerPage, CurrentPageIndex, ContainerDivID) {
    Count = 0;
    TotalRecord_Temp = TotalRecord;
    PageSize_Temp = PageSize;
    NumbersPerPage_Temp = NumbersPerPage;
    CurrentPageIndex_Temp = CurrentPageIndex;
    ContainerDivID_Temp = ContainerDivID;
    LoopCount = NumbersPerPage
    TotalPages = Math.ceil(TotalRecord / PageSize);

    prevClass = "enabledli";
    NextClass = "enabledli";
    ActiveIndex = "notActive";
    if (CurrentPageIndex == 1) {
        prevClass = "disabledli";
    }

    var MyPagingDiv = "<div class='PagingDiv'>";
    MyPagingDiv += "<ul>";
    MyPagingDiv += "<li class='" + prevClass + "'><a onclick='NavigatePrevPage(this)'>  Previous</a></li>";
    //MyPagingDiv += "<li class='" + prevClass + "'><a onclick='NavigatePrevPage(this)'><</a></li>";
    StartPageNo = (CurrentPageIndex - 1) * NumbersPerPage + 1;
    CurrentPageNo = StartPageNo;

    while (LoopCount >= 1) {
        if (Count == 0) {
            FirstNo = parseInt(CurrentPageNo);
        }
        Count = Count + 1;
        if (CurrentPageIndex == CurrentPageNo) {
            ActiveIndex = "pageactive";
        }
        else {
            ActiveIndex = "notactive";
        }
        MyPagingDiv += "<li><a id='" + "liNav" + (NumbersPerPage - LoopCount + 1).toString() + "' class='" + ActiveIndex + "' onclick='PageNoClick(this," + CurrentPageNo.toString() + ")'>" + CurrentPageNo.toString() + "</a></li>";
        LoopCount = LoopCount - 1;
        CurrentPageNo = parseInt(CurrentPageNo) + 1;
        if (CurrentPageNo > TotalPages) {
            LoopCount = 0;
        }
    }

    if (CurrentPageNo > TotalPages) {
        NextClass = "disabledli";
    }

    MyPagingDiv += "<li class='" + NextClass + "'><a onclick='NavigateNextPage(this)'>Next</a></li>";
    MyPagingDiv += "</ul></div>";
    $(ContainerDivID).html(MyPagingDiv);
    if (TotalPages <= 1) {
        $(".PagingDiv").hide();
    }
}
function NavigateNextPage(id_next) {
    if (CurrentPageNo <= TotalPages) {
        CreateCustomPagging(TotalRecord_Temp, PageSize_Temp, NumbersPerPage_Temp, parseInt(CurrentPageIndex_Temp) + 1, ContainerDivID_Temp);
    }
}
function NavigatePrevPage(id_Prev) {
    if (parseInt(CurrentPageIndex_Temp) - 1 > 0) {
        CreateCustomPagging(TotalRecord_Temp, PageSize_Temp, NumbersPerPage_Temp, parseInt(CurrentPageIndex_Temp) - 1, ContainerDivID_Temp);
    }
}
function isValidSpecialCharector(str) {
    return !/[~`!#$%\^&*+=\[\]\\';,/{}|\\":<>\?]/g.test(str);
}
function PageNoClick(id_temp, PageNo) {
    PageNavigationClick(id_temp, PageNo);
}

var myAlertDiv = "";
var ClickCotrol = "";
function ShowAlertPopup(ErrorTitle, ErrolMessage, ControlId) {
    ClickCotrol = ControlId;
    myAlertDiv = "";
    myAlertDiv = '<div id="divAlertPopup" class="alertPopupBody"><div class="mb-container"><div class="mb-middle"><div class="mb-title"><span class="fa fa-times"></span> ' + ErrorTitle + '</div><div class="mb-content"><p>' + ErrolMessage + '</p></div><div class="mb-footer"><button class="btn btn-default btn-md  mb-control-close" onclick="closedivAlertPopup()">Close</button></div></div></div></div>';
    myAlertDiv += '<div class="messagepopup-overlay"></div>';
    $("body").append(myAlertDiv);
}
function closedivAlertPopup() {
    $("#divAlertPopup").remove();
    $(".messagepopup-overlay").remove();
    if (ClickCotrol != "") {
        $(ClickCotrol).focus();
        ClickCotrol = "";
    }
}
function ShowSuccessPopup(SuccessTitle, SuccessMessage) {
    myAlertDiv = "";
    myAlertDiv = '<div id="divAlertPopup" class="ConfirmPopupBody"><div class="mb-container"><div class="mb-middle"><div class="mb-title"><span class="fa fa-check"></span> ' + SuccessTitle + '</div><div class="mb-content"><p>' + SuccessMessage + '</p></div><div class="mb-footer"><button class="btn btn-default btn-md  mb-control-close" onclick="closedivSuccessPopup()">Close</button></div></div></div></div>';
    myAlertDiv += '<div class="messagepopup-overlay"></div>';
    $("body").append(myAlertDiv);
}

function closedivSuccessPopup() {
    $("#divAlertPopup").remove();
    $(".messagepopup-overlay").remove();
}

function ShowWarningPopup(WarningTitle, WarningMessage) {
    myAlertDiv = "";
    myAlertDiv = '<div  id="divAlertPopup" class="WarningPopupBody"><div class="mb-container"><div class="mb-middle"><div class="mb-title"><span class="fa fa-warning"></span> ' + WarningTitle + '</div><div class="mb-content"><p>' + WarningMessage + '</p></div><div class="mb-footer"><button class="btn btn-default btn-md  mb-control-close" onclick="closedivWarningPopup()">Close</button></div></div></div></div>';
    myAlertDiv += '<div class="messagepopup-overlay"></div>';
    $("body").append(myAlertDiv);
}

function closedivWarningPopup() {
    $("#divAlertPopup").remove();
    $(".messagepopup-overlay").remove();
}

function ShowInformationPopup(InformationTitle, InformationMessage) {
    myAlertDiv = "";
    myAlertDiv = '<div id="divAlertPopup" class="infoPopupBody"><div class="mb-container"><div class="mb-middle"><div class="mb-title"><span class="fa fa-info"></span> ' + InformationTitle + '</div><div class="mb-content"><p>' + InformationMessage + '</p></div><div class="mb-footer"><button class="btn btn-default btn-md  mb-control-close" onclick="closedivInformationPopup()">Close</button></div></div></div></div>';
    myAlertDiv += '<div class="messagepopup-overlay"></div>';
    $("body").append(myAlertDiv);
}

function closedivInformationPopup() {
    $("#divAlertPopup").remove();
    $(".messagepopup-overlay").remove();
}

function ShowConfirmationPopup(ConfirmationTitle, ConfirmationMessage) {
    myAlertDiv = "";
    myAlertDiv = '<div id="divAlertPopup" class="infoPopupBody"><div class="mb-container"><div class="mb-middle"><div class="mb-title"><span class="fa fa-info"></span> ' + ConfirmationTitle + '</div><div class="mb-content"><p>' + ConfirmationMessage + '</p></div><div class="mb-footer"><button class="btn btn-default btn-md  mb-control-close" onclick="yesDoIt()">Yes</button><button class="btn btn-default btn-md  mb-control-close" onclick="noDoIt()">No</button></div></div></div></div>'
    myAlertDiv += '<div class="messagepopup-overlay"></div>';
    $("body").append(myAlertDiv);
}

function yesDoIt() {
    $("#divAlertPopup").remove();
    $(".messagepopup-overlay").remove();
    return true;
}

function noDoIt() {
    $("#divAlertPopup").remove();
    $(".messagepopup-overlay").remove();
    return false;
}

function ShowProgressOnBody() {
    $('body').append("<div id='divProgressCommon'></div>");
    $("#divProgressCommon").html(" <span class='loading style-3'></span>");
    $("#divProgressCommon").addClass("progressAddCommon");
}
function RemoveProgressFromBody() {
    $("#divProgressCommon").html("");
    $("#divProgressCommon").removeClass("progressAddCommon");
    $("#divProgressCommon").remove();
}

function ShowPageLoader(msg) {
    return "<div class='pageloader1'><div class='msg'>" + msg + "<div> <div class='loadingPage style-1'></div></div>";
}


$('.dtmdate').keydown(function (e) {
    if (parseInt(event.keyCode) == 8 || parseInt(event.keyCode) == 32 || parseInt(event.keyCode) == 46) {
        $(this).val('');
    }
    return false;
});
$('.cssOnlyNumericDecimal').keypress(function (eve) {
    if (eve.keyCode == 8 || eve.keyCode == 9 || eve.keyCode == 37 || eve.keyCode == 37 || eve.keyCode == 36) {
    }
    else {
        if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0)) {
            eve.preventDefault();
        }
        $(this).keyup(function (eve) {
            if ($(this).val().indexOf('.') == 0) {
                $(this).val($(this).val().substring(1));
            }
        });
    }
});



//-------------------------------------------------------validate email----------------------------------
function validateEmail(email) {
    var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    var valid = emailReg.test(email);

    if (!valid) {
        return false;
    } else {
        return true;
    }
}

var divTextID = " ";
function ResetTextBox(className, cssName) {
    divTextID = "." + className + " input[type='text'],input[type='password']";
    // alert(divTextID);
    $(divTextID).each(function () {
        $(this).val("");
        $(this).removeClass(cssName);
    });
}

function ResetTextBoxCssById(idName, cssName) {
    divTextID = "#" + idName + " input[type='text'],input[type='password'],select";
    // alert(divTextID);
    $(divTextID).each(function () {
        $(this).removeClass(cssName);
    });
}

function ResetFormAndCssByID(idName, cssName) {
    divTextID = "#" + idName + " input[type='text'],input[type='password'],select";
    // alert(divTextID);
    $(divTextID).each(function () {
        $(this).removeClass(cssName);
        $(this).val("");
    });
}
function RemoveSpan(className, cssName) {
    // alert(divTextID);
    $("." + className + " ." + cssName).each(function () {
        $(this).remove();
    });
}

function RemoveSpanById(IDName, cssName) {
    $("#" + IDName + " ." + cssName).each(function () {
        $(this).remove();
    });
}

function AddErrorSpan(controlId, className, message) {
    $("#" + controlId).after("<span class='" + className + "'><dt class='ErrorArrow'></dt>" + message + "</span>");
    $("." + className).fadeIn(200);
}

function AddValidSpan(controlId, className) {
    $("#" + controlId).after("<span class='" + className + "'></span>");
}
function AddSuccessSpanAfter(controlId, className, message) {
    $("#" + controlId).after("<span class='" + className + "'>" + message + "</span>");
    $("." + className).fadeIn(200);
}

function AddErrorSpanAbove(controlId, className, message) {
    $("#" + controlId).before("<span class='" + className + "'><dt class='ErrorArrow'></dt>" + message + "</span>");
    $("." + className).fadeIn(200);
}

function AddtxtErroHover(controlId) {
    $("#" + controlId).addClass("txtErroHover");
    $("body, html").animate({
        scrollTop: $('#' + controlId).offset().top - 60
    }, 500);
    $('#' + controlId).focus();
}
function RemovetxtErroHover(className) {
    $("." + className + " .txtErroHover").each(function () {
        $(this).removeClass("txtErroHover");
    });
}
function RemovetxtErroHoverByID(className) {
    $("#" + className + " .txtErroHover").each(function () {
        $(this).removeClass("txtErroHover");
    });
}
function RemoveValidIconId(IDName, cssName) {
    $("#" + IDName + " ." + cssName).each(function () {
        $(this).remove();
    });
}

function CustomFocusBYID(controlID) {
    $('#' + controlID).focus();
    $("body, html").animate({
        scrollTop: $('#' + controlID).offset().top
    }, 500);
    $('#' + controlID).focus();
}

var MySuccessLabel = " ";
function GetSuccessLabel(msg) {
    MySuccessLabel = " <div class='successLabel' >" + msg + " <div  onclick='closeSuccessLabel(this)' class='close'><a>×</a></div> </div>";

    return MySuccessLabel;
}
function GetErrorLabel(msg) {
    MySuccessLabel = " <div class='errorLabel' >" + msg + " <div  onclick='closeSuccessLabel(this)' class='close'><a>×</a></div> </div>";
    return MySuccessLabel;
}
function closeSuccessLabel(id) {
    $(id).parent('div').fadeOut(500);
    return;
}

var ControlIDTemp = "";
var HasClassTemp = "";
var IsValid = "yes";
function ValidateDiv(formID) {
    $('#' + formID + ' td').each(function () {
        if (IsValid == "no") {
            return;
        }
        if ($(this).find(':radio').length > 0) {
            ControlIDTemp = $(this).find(':radio').attr("id");
            HasClassTemp = $("#" + ControlIDTemp).hasClass("required");
            if (HasClassTemp == true) {
                if ($('input[name=' + ControlIDTemp + ']:checked').val() == undefined) {
                    alert("Please select " + $(this).prev('td').text().replace("*", ""));
                    IsValid = "no";
                    return;
                }
            }
        }
        if ($(this).find(':text').length > 0) {
            if ($(this).find(':text').length > 0) {
                $(this).find(':text').each(function () {
                    ControlIDTemp = $(this).attr("id");
                    HasClassTemp = $("#" + ControlIDTemp).hasClass("required");
                    if (HasClassTemp == true) {
                        if ($("#" + ControlIDTemp).val().trim() == "") {
                            AddtxtErroHover(ControlIDTemp);
                            IsValid = "no";
                        }
                        else {
                            if (("#" + ControlIDTemp) == "#txtAdPrice") {
                                var price = $("#" + ControlIDTemp).val().trim();
                                if (parseFloat(price) <= 0) {
                                    AddtxtErroHover(ControlIDTemp);
                                    IsValid = "no";
                                }
                            }
                        }
                    }
                });
            }
        }
        if ($(this).find('select').length > 0) {
            ControlIDTemp = $(this).find('select').attr("id");
            HasClassTemp = $("#" + ControlIDTemp).hasClass("required");
            if (HasClassTemp == true) {
                if ($("#" + ControlIDTemp + " option:selected").val().trim() == "") {
                    AddtxtErroHover(ControlIDTemp);
                    IsValid = "no";
                    return;
                }
            }
        }
        if ($(this).find('textarea').length > 0) {
            ControlIDTemp = $(this).find('textarea').attr("id");
            HasClassTemp = $("#" + ControlIDTemp).hasClass("required");
            if (HasClassTemp == true) {
                if ($("#" + ControlIDTemp).val().trim() == "") {
                    AddtxtErroHover(ControlIDTemp);
                    IsValid = "no";
                    return;
                }
            }
        }
    });
}

function mF(n, d) {
    if (d == 0)
        return Math.round(n * 1);
    else if (d == 1)
        return Math.round(n * 10) / 10;
    else if (d == 2)
        return Math.round(n * 100) / 100;
    else if (d == 3)
        return Math.round(n * 1000) / 1000;
    else if (d == 4)
        return Math.round(n * 10000) / 10000;
    else if (d == 5)
        return Math.round(n * 100000) / 100000;
    return n;
}

