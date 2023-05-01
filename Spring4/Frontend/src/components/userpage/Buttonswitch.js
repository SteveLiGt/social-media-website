import React, {useState} from "react";
import "./Buttonswitch.css";
import {useNavigate, useParams} from "react-router-dom"


// function ButtonSwitcher({email}){
//
//     const path = "/userpage/" + email;
//     const navigate = useNavigate()
//     let buttonName = ['Page','Fans','Following','Blog','Album']
//     let buttonLink = [path,'/Fans','/Following','/Blogs','/Album']
//
//     // const ButtonObject=[
//     //     {id:1},{id:2},{id:3},{id:4},{id:5}
//     // ]
//
//     const[buttonState, changeState] = useState({
//         activeObject: null ,
//         object:[{id:1},{id:2},{id:3},{id:4},{id:5}]
//     });
//
//
//     function toggleActive(index){
//         changeState ({ ...buttonState, activeObject: buttonState.object[index]});
//         navigate(buttonLink[index])
//     }
//
//     function toggleActiveStyle(index){
//         if(buttonState.object[index] === buttonState.activeObject){
//             return "button active";
//         }else{
//             return "button inactive";
//         }
//     }
//     return(
//         <div className = 'Button'>
//             {buttonState.object.map((elements, index)=>(
//                 <div
//                     key={index}
//                     className={toggleActiveStyle(index)}
//                     onClick={()=> {
//                         toggleActive(index);
//                     }}
//                 >{buttonName[index]}</div>
//             ))}
//         </div>
//     )
// }

const ButtonSwitcher = ({email}) => {
    const navigate = useNavigate();

    const path = "/userpage/" + email;
    const followers = '/Followers/' + email;
    const following = '/Following/' + email;
    const blog = '/Blogs/' + email;
    const photo = '/Album/' + email;


    return (

        <div className="right-column2">
            <div className="right-column-content2">
                <div className='UserPage'>
                    <button type='button' className='MyPage' onClick={()=>navigate(blog)}>
                        <p6>Blog</p6>
                        <br/></button>
                    <button type='button' className='MyFans' onClick={()=>navigate(followers)}>
                        <p2>Followers</p2>
                        <br/></button>
                    <button type='button' className='MyFollowing' onClick={()=>navigate(following)}>
                        <p3>Following</p3>
                        <br/></button>
                    <button type='button' className='MyBlog' onClick={()=>navigate(path)}>
                        <p1>Personal Info</p1>
                        <br/></button>
                </div>
            </div>
        </div>
    );
};

export default ButtonSwitcher;