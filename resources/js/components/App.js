import React, { Component } from 'react';
import axios from 'axios';

class App extends Component {

    componentWillMount(){
        this.getPosts();
    }

    componentDidMount(){
        this.interval = setInterval(()=>this.getPosts(),10000);
    }

    componentWillUnmount(){
        this.interval=setInterval(()=>this.getPosts(), 10000);
    }

    constructor(props) {
        super(props);
        this.state={
            body:"",
            posts:[],
            loading:false
        };

        this.getPosts=()=>{
            this.setState({loading:true});
            axios.get('/posts').then((
                response
            )=>
            this.setState({
                posts:[...response.data.posts],
                loading:false,
            }));
        }

       this.handleSubmit=e=> {
            e.preventDefault();
            // this.postData()

           axios.post('/posts', {
               body:this.state.body,
           }).then(response =>{
               console.log(response);
               this.setState({
               posts:[...this.state.posts,response.data]
           })});
           this.setState({
               body:""
           })
        }
       // this.postData=()=>{
       //
       //  }
       this.handleChange=(e)=>{
           this.setState({
               body: e.target.value,
           })
        }

        this.returnPosts=()=>{
            return this.state.posts.map(post=>
                <div key={post.id}>
                    <img src={post.user.avatar} alt=""/>
                    <a href={`/users/${post.user.name}`}><b>{post.user.name}</b></a>
                    <p>{post.body}</p>
                </div>)
        }
    }


    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <div className="card">
                            <div className="card-header">Tweet something...</div>

                            <div className="card-body">
                                <form onSubmit={this.handleSubmit}>
                                    <div className="form-group">
                                        <textarea
                                                  onChange={this.handleChange}
                                                  className="form-control"
                                                  id=""
                                                  value={this.state.body}
                                                  maxLength="140"
                                                  placeholder="Whats up?"
                                                  rows="5"
                                                  required
                                        />
                                    </div>
                                    <input type="submit" value="Post" className="form-control"/>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body" style={{display:'inline-block'}}>
                                {!this.state.loading ? this.returnPosts(): this.returnPosts()}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
export default App;