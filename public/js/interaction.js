const URL = "http://127.0.0.1:5984";

// Variables
var user_name = document.getElementById('user_name').value;
var user_email = document.getElementById('user_email').value;

function sendHomeVisit(){
	var viewedStatement = {
	    "actor": {
	        "name": user_name,
	        "mbox": "mailto:" + user_email,
	        "objectType": "Agent"
	    },  
	    "verb": {  
	        "id": "https://w3id.org/xapi/seriousgames/verbs/accessed",
	        "display": {"en-US": "accessed"}
	    },  
	    "object": {  
	        "id": "http://apprenticeship.com/xapi/home_view",
	        "definition": {  
	            "name": {"en-US": "Home view"},
	            "description": {"en-US": "User viewed the home page."}
	        },  
	        "objectType": "Activity"  
	    }  
	};

	sendStatement(generateUUID(), viewedStatement);
}

function sendNDAVisit(){
	var viewedStatement = {
	    "actor": {
            "name": user_name,
            "mbox": "mailto:" + user_email,
	        "objectType": "Agent"
	    },
	    "verb": {
	        "id": "https://w3id.org/xapi/seriousgames/verbs/accessed",
	        "display": {"en-US": "accessed"}
	    },
	    "object": {
	        "id": "http://apprenticeship.com/xapi/nda_view",
	        "definition": {
	            "name": {"en-US": "NDA view"},
	            "description": {"en-US": "User viewed the nda page."}
	        },
	        "objectType": "Activity"
	    }
	};

	ADL.XAPIWrapper.sendStatement(viewedStatement);
}

function sendEaaVisit(){
	var viewedStatement = {
	    "actor": {
            "name": user_name,
            "mbox": "mailto:" + user_email,
	        "objectType": "Agent"
	    },
	    "verb": {
	        "id": "https://w3id.org/xapi/seriousgames/verbs/accessed",
	        "display": {"en-US": "accessed"}
	    },
	    "object": {
	        "id": "http://apprenticeship.com/xapi/eaa_view",
	        "definition": {
	            "name": {"en-US": "EAA view"},
	            "description": {"en-US": "User viewed the EAA page."}
	        },
	        "objectType": "Activity"
	    }
	};

	ADL.XAPIWrapper.sendStatement(viewedStatement);
}

function sendIOAVisit(){
	var viewedStatement = {
	    "actor": {
            "name": user_name,
            "mbox": "mailto:" + user_email,
	        "objectType": "Agent"
	    },
	    "verb": {
	        "id": "https://w3id.org/xapi/seriousgames/verbs/accessed",
	        "display": {"en-US": "accessed"}
	    },
	    "object": {
	        "id": "http://apprenticeship.com/xapi/ioa_view",
	        "definition": {
	            "name": {"en-US": "IOA view"},
	            "description": {"en-US": "User viewed the IOA page."}
	        },
	        "objectType": "Activity"
	    }
	};

	ADL.XAPIWrapper.sendStatement(viewedStatement);
}

function sendSkillsVisit(){
	var viewedStatement = {
	    "actor": {
            "name": user_name,
            "mbox": "mailto:" + user_email,
	        "objectType": "Agent"
	    },
	    "verb": {
	        "id": "https://w3id.org/xapi/seriousgames/verbs/accessed",
	        "display": {"en-US": "accessed"}
	    },
	    "object": {
	        "id": "http://apprenticeship.com/xapi/skills_view",
	        "definition": {
	            "name": {"en-US": "Skills view"},
	            "description": {"en-US": "User viewed the skills page."}
	        },
	        "objectType": "Activity"
	    }
	};

	ADL.XAPIWrapper.sendStatement(viewedStatement);
}

function sendInternsListVisit(){
	var viewedStatement = {
	    "actor": {
            "name": user_name,
            "mbox": "mailto:" + user_email,
	        "objectType": "Agent"
	    },
	    "verb": {
	        "id": "https://w3id.org/xapi/seriousgames/verbs/accessed",
	        "display": {"en-US": "accessed"}
	    },
	    "object": {
	        "id": "http://apprenticeship.com/xapi/interns_view",
	        "definition": {
	            "name": {"en-US": "Interns view"},
	            "description": {"en-US": "User viewed the interns page."}
	        },
	        "objectType": "Activity"
	    }
	};

	ADL.XAPIWrapper.sendStatement(viewedStatement);
}

function sendManagersListVisit(){
	var viewedStatement = {
	    "actor": {
            "name": user_name,
            "mbox": "mailto:" + user_email,
	        "objectType": "Agent"
	    },
	    "verb": {
	        "id": "https://w3id.org/xapi/seriousgames/verbs/accessed",
	        "display": {"en-US": "accessed"}
	    },
	    "object": {
	        "id": "http://apprenticeship.com/xapi/managers_view",
	        "definition": {
	            "name": {"en-US": "Managers view"},
	            "description": {"en-US": "User viewed the manager page."}
	        },
	        "objectType": "Activity"
	    }
	};

	ADL.XAPIWrapper.sendStatement(viewedStatement);
}

function sendAdminsListVisit(){
	var viewedStatement = {
	    "actor": {
            "name": user_name,
            "mbox": "mailto:" + user_email,
	        "objectType": "Agent"
	    },
	    "verb": {
	        "id": "https://w3id.org/xapi/seriousgames/verbs/accessed",
	        "display": {"en-US": "accessed"}
	    },
	    "object": {
	        "id": "http://apprenticeship.com/xapi/admins_view",
	        "definition": {
	            "name": {"en-US": "Admins view"},
	            "description": {"en-US": "User viewed the admins page."}
	        },
	        "objectType": "Activity"
	    }
	};

	ADL.XAPIWrapper.sendStatement(viewedStatement);
}

function sendStatement(id, statement) {
    /*$.ajax({
        type: 'PUT',
        url: 'http://admin:admin@127.0.0.1:5984/apprenctice-lrs/' + id,
        data: {
            statement
        },
        success: function(data) {
            //alert("Data: " + data + "\nStatus: " + status);
			console.log('saved');
        }
    });*/
    $.ajax({
        type: 'PUT',
        url: 'http://admin:admin@127.0.0.1:5984/apprenctice-lrs/' + id,
        data: JSON.stringify(statement),
        headers: {
            "Content-Type": "application/json"
        },
        crossDomain: true,
        dataType: 'json',
        success: function(data) {
            //alert("Data: " + data + "\nStatus: " + status);
			console.log('saved');
        }

    });


}

function generateUUID() {
    var d = new Date().getTime();
    var uuid = 'xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = (d + Math.random()*16)%16 | 0;
        d = Math.floor(d/16);
        return (c=='x' ? r : (r&0x3|0x8)).toString(16);
    });

    return uuid;
};
