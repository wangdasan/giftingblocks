
/**
 * Module dependencies.
 */

var express 	= require('express')
var nodemailer 	= require("nodemailer");
var passport 	= require('passport')
var FacebookStrategy = require('passport-facebook').Strategy;

var app = module.exports = express.createServer(),
	mongoose = require( 'mongoose' ); //MongoDB integration

// Configuration
app.configure(function(){
  app.set('views', __dirname + '/views');
  app.set('view engine', 'jade');
  app.use(express.bodyParser());
  app.use(express.methodOverride());
  app.use(express.cookieParser());
  app.use(express.session({secret: '1234567890QWERTY'}));

  // Initialize Passport!  Also use passport.session() middleware, to support
  // persistent login sessions (recommended).
  app.use(passport.initialize());
  app.use(passport.session());
  
  app.use(app.router);
  app.use(express.static(__dirname + '/public'));
});

app.configure('development', function(){
  app.use(express.errorHandler({ dumpExceptions: true, showStack: true }));
});

app.configure('production', function(){
  app.use(express.errorHandler());
});

//mongo connect schema and model
//mongoose.connect('mongodb://nodejitsu_surpass:bccjkk637ji1rf872f0peu559b@ds059887.mongolab.com:59887/nodejitsu_surpass_nodejitsudb1065345050');
mongoose.connect( 'mongodb://localhost/giftdb' );



//Facebook
var FACEBOOK_APP_ID 	= "149379311929856"
var FACEBOOK_APP_SECRET = "c31932000c72029762a6eb8c0f24d7cc";


// Passport session setup.
//   To support persistent login sessions, Passport needs to be able to
//   serialize users into and deserialize users out of the session.  Typically,
//   this will be as simple as storing the user ID when serializing, and finding
//   the user by ID when deserializing.  However, since this example does not
//   have a database of user records, the complete Facebook profile is serialized
//   and deserialized.
passport.serializeUser(function(user, done) {
  done(null, user);
});

passport.deserializeUser(function(obj, done) {
  done(null, obj);
});

// Use the FacebookStrategy within Passport.
//   Strategies in Passport require a `verify` function, which accept
//   credentials (in this case, an accessToken, refreshToken, and Facebook
//   profile), and invoke a callback with a user object.
passport.use(new FacebookStrategy({
    clientID: FACEBOOK_APP_ID,
    clientSecret: FACEBOOK_APP_SECRET,
    callbackURL: "http://localhost:3000/auth/facebook/callback"
  },
  function(accessToken, refreshToken, profile, done) {
    // asynchronous verification, for effect...
    process.nextTick(function () {
      
      // To keep the example simple, the user's Facebook profile is returned to
      // represent the logged-in user.  In a typical application, you would want
      // to associate the Facebook account with a user record in your database,
      // and return that user instead.
      return done(null, profile);
    });
  }
));



//Schemas
var User = new mongoose.Schema({
fn: String,
ln: String,
em: String,
fbid: String,
pass: String,
add1: String,
add2: String,
city: String,
state: String,
zip: String,
phone: String,
gender: String,
right: String,
left: String
});

//Models
var UserModel = mongoose.model( 'gUser', User);

//Routing
app.get('/', function(req,res)
{
	console.log(req.cookies);
	if (!req.session.user)
	{
		//if (!req.cookies.em)
			res.render('index',{layout:false});
		/*else
		{
			res.render('index',{em:req.cookies.em,pass:req.cookies.pass,layout:false});
		}*/
	}
	else
		res.redirect('/profile');
});

//send verification mail
app.post('/sendverif',function(req,res)
{
	console.log(req.body.em+","+req.body.fn+","+req.body.ln);
	var smtpTransport = nodemailer.createTransport("SMTP",{
	    service: "Gmail",
	    auth: {
	        user: "wangdali124@gmail.com",
	        pass: "aifdkrtys2013"
	    }
	});

	// setup e-mail data with unicode symbols
	var haddr=req.headers.host;
	var shtml="Hi, "+req.body.fn+" "+req.body.ln+", Welcome to GiftsBlock!<br>"
	+" Click <a href='http://localhost:3000/checkverif?em="+req.body.em+"&fn="+req.body.fn+"&ln="+req.body.ln+"'> <b> here </b> </a> to verify your account";
		//+" Click <a href='http://www.giftsblock.jit.su/checkverif?em="+req.body.em+"&fn="+req.body.fn+"&ln="+req.body.ln+"'> <b> here </b> </a> to verify your account";
	console.log(shtml);
	
	var mailOptions = {
	    from: "Wang <wangdali124@gmail.com>", // sender address
	    to: req.body.em, // list of receivers
	    subject: "Welcome to GiftsBlock", // Subject line
	    html: shtml
	}

	// send mail with defined transport object
	smtpTransport.sendMail(mailOptions, function(error, response){
	    if(error){
	    	res.send("email error: try again!");
	        console.log("myerror"+error);
	    }else{
	    	
	        console.log("Message sent: " + response.message);
	    }
	    // if you don't want to use this transport object anymore, uncomment following line
	    smtpTransport.close(); // shut down the connection pool, no more messages
	});
	res.send("ok");
});

//verification process
app.get('/checkverif',function(req,res)
{
	console.log("sibal: "+req.query.em);
	
	UserModel.findOne({em:req.query.em},function(err,docs)
	{
		console.log("really here:"+docs)
		
		if (!err)
		{
			if (!docs)
			{
				res.render("getting_started",{em:req.query.em,fn:req.query.fn,ln:req.query.ln,layout:false});
			}
			else
			{
				console.log(docs);
				res.send("You already verified your account!");
			}
		}
		else
		{
			console.log(!err);
		}
	});	
});

//login
app.post('/login',function(req,res)
{
	console.log(req.body);
	UserModel.findOne({em: req.body.username, pass: req.body.password},function(err,doc)
	{
		if(err)
		{
			console.log(err);
			
		}
		else if (doc)
		{
			console.log(doc.em);
			req.session.user=doc.em;
			
			if (req.body.rememberme)
			{
				res.cookie('em', doc.em, { maxAge: 900000, httpOnly: true });
				res.cookie('pass', doc.pass, { maxAge: 900000, httpOnly: true });
			}
			res.redirect("/profile");
		}
		else
		{
			//res.redirect("/");
		}
	});
});

//save profile and

app.post('/saveprofile',function(req,res)
{
	console.log(req.body);
	if (req.body.fmfn!="")
	{
		var user = new UserModel({
	        fn: req.body.fmfn,
	        ln: req.body.fmln,
	        em: req.body.fmem,
	        pass: req.body.fmpass,
	        add1: req.body.fmadd1,
	        add2: req.body.fmadd2,
	        city: req.body.fmcity,
	        state: req.body.fmstate,
	        zip: req.body.fmzip,
	        phone: req.body.fmphone,
	        right: req.body.fmright,
	        left: req.body.fmleft
	    });
	    user.save( function( err )
	    {
	        if( !err ) 
	        {
	            console.log( 'user created' );
	            res.redirect('/profile');
	            
	        } else {
	            console.log( err );
	            res.send("fatal error");
	        }
	    });
	}
	else
	{
		res.send("You 're not authorized to access here");
	}
});
//profile
app.get('/profile',function(req,res)
{
	res.render('settings',{layout:false});
});
//logout
app.get('/logout',function(req,res)
{
	req.session.user=null;
	res.redirect('/');
});

//Facebook Connect
app.get('/auth/facebook', passport.authenticate('facebook'));
app.get('/auth/facebook/callback', function(req, res, next) {
    passport.authenticate('facebook',
        function(err, user, info) {
            // Successful authentication, redirect home.
            var facebook = false;

            facebook = req.flash('facebook')[0];
            if (facebook && !user){
                req.flash('facebook', facebook);
                req.flash('facebookRegisterMessage', 'Please register and PeerCover will import your Facebook data.');
                return res.redirect('/register');
            }
            else{
                req.logIn(user, function(err) {
                    if (err) {
                        //req.flash('loginFailure', 'Login Failed');
                        console.log('Login Failed');
                        return res.redirect('/');
                    }
                    // make /profile next
                    //req.flash('loginSuccess', 'Login Successful');
                    console.log('Login Successful');
                    console.log(req.user);
                    
                    var user = new UserModel({
            	        fn: req.user._json.first_name,
            	        ln: req.user._json.last_name,
            	        em: req.user.emails[0].value,
            	        fbid: req.user.id,
            	        pass: '',
            	        add1: '',
            	        add2: '',
            	        city: '',
            	        state: '',
            	        zip: '',
            	        phone: '',
            	        right: '',
            	        left: ''
            	    });
            	    user.save( function( err )
            	    {
            	        if( !err ) 
            	        {
            	            console.log( 'user created' );
            				req.session.user = req.user.id;
            	            res.redirect('/profile');
            	            
            	        } else {
            	            //console.log( err );
            	            res.send("fatal error");
            	        }
            	    });
            	    
                    //return res.redirect('/profile');
                });
            }
        })(req, res, next);
});


app.listen(3000, function(){
  console.log("Express server listening on port %d in %s mode", app.address().port, app.settings.env);
});