const Profile = () => {
    return (
        <div style={{ marginTop: '5%' }}>
            <span id='profile-title'>Profile</span>
            <span id='user'>Hello {localStorage.getItem('user')}</span>
            <hr/>
            <div id='profile-main'>

            </div>
        </div>
    )
}

export default Profile;