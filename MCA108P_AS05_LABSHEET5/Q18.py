from flask import Flask,request,session
app=Flask(__name__); app.secret_key="change-this-secret-key"
@app.route("/",methods=["GET","POST"])
def home():
 if request.method=="POST": session["user_id"]=request.form.get("user_id")
 return f'''<h2>Python Session Demo</h2><form method="post"><input name="user_id" required><button>Login</button></form><p>Session: {session.get("user_id","Not logged in")}</p>'''
if __name__=="__main__": app.run(debug=True)
