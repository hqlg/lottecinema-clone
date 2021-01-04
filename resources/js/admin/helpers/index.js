export const isEmptyArray = length => length === 0;

export const counter = num => ++num;

export const shortent = str => str.slice(0, 20) + "...";

export const reconfirm = e => {
    const isDeleted = confirm("Are you sure want to delete it?");
    if (!isDeleted) {
        e.preventDefault();
    }
};
