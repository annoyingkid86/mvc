export default async () => {
    const data = await fetch('api/quote');
    const json = await data.json();

    return json;
};
