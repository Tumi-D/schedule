class Auth {
    constructor(user) {
        this.user = user;
    }
    roles() {
        return this.user.roles.map(role => role.name);
    }
    permissions() {
        return this.user.permissions.map(permission => permission.name);
    }
    isAdmin() {
        return this.roles().includes("Admin");
    }
    SAdmin() {
        return this.roles().includes("SAdmin");
    }
    can($permissionName) {
        return this.roles().includes($permissionName);
    }
}
export default Auth;
